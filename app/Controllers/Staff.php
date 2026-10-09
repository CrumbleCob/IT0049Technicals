<?php

namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Staff extends BaseController
{
    private UserModel $users;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->users = new UserModel();
    }

    public function index()
    {
        return view('staff/index', [
            'title' => 'Staff Accounts',
            'users' => $this->users->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            if (! $this->validate($this->rules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->userData();
            $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);
            $data['created_at'] = date('Y-m-d H:i:s');
            $avatar = $this->request->getFile('avatar');
            if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {
                $data['avatar'] = $this->prepareAvatar($avatar);
            }

            $this->users->insert($data);
            return redirect()->to('/staff')->with('success', 'Staff account added successfully.');
        }

        return view('staff/form', ['title' => 'New Staff Account', 'user' => null]);
    }

    public function edit(int $id)
    {
        $user = $this->findUser($id);

        if ($this->request->is('post')) {
            if (! $this->validate($this->rules($id))) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->userData();
            if ($this->request->getPost('password')) {
                $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);
            }
            $avatar = $this->request->getFile('avatar');
            if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {
                $data['avatar'] = $this->prepareAvatar($avatar);
                $this->removeAvatar($user['avatar'] ?? null);
            }

            $this->users->update($id, $data);
            if ((int) session('user_id') === $id) {
                session()->set(['username' => $data['username'], 'full_name' => $data['full_name']]);
            }
            return redirect()->to('/staff')->with('success', 'Staff account updated successfully.');
        }

        return view('staff/form', ['title' => 'Edit Staff Account', 'user' => $user]);
    }

    public function delete(int $id)
    {
        $user = $this->findUser($id);
        if ((int) session('user_id') === $id) {
            return redirect()->to('/staff')->with('error', 'You cannot delete the account currently logged in.');
        }
        if ((new SaleModel())->where('sold_by', $id)->countAllResults() > 0) {
            return redirect()->to('/staff')->with('error', 'This staff member has sales history and cannot be deleted.');
        }

        $this->users->delete($id);
        $this->removeAvatar($user['avatar'] ?? null);
        return redirect()->to('/staff')->with('success', 'Staff account deleted.');
    }

    private function rules(?int $id = null): array
    {
        $unique = $id ? "is_unique[users.username,id,{$id}]" : 'is_unique[users.username]';
        $rules = [
            'username' => "required|min_length[3]|max_length[50]|alpha_dash|{$unique}",
            'full_name' => 'required|min_length[2]|max_length[100]',
        ];
        if ($id === null || $this->request->getPost('password')) {
            $rules['password'] = 'required|min_length[8]|max_length[72]';
            $rules['password_confirm'] = 'required|matches[password]';
        }
        $avatar = $this->request->getFile('avatar');
        if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png,image/webp]|ext_in[avatar,jpg,jpeg,png,webp]|max_size[avatar,2048]';
        }
        return $rules;
    }

    private function userData(): array
    {
        return [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
        ];
    }

    private function prepareAvatar($avatar): string
    {
        $temp = WRITEPATH . 'uploads';
        $public = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'staff';
        if (! is_dir($temp)) mkdir($temp, 0775, true);
        if (! is_dir($public)) mkdir($public, 0775, true);

        $name = $avatar->getRandomName();
        $avatar->move($temp, $name);
        $source = $temp . DIRECTORY_SEPARATOR . $name;
        $destination = $public . DIRECTORY_SEPARATOR . $name;
        try {
            service('image')->withFile($source)->fit(500, 500, 'center')->save($destination, 85);
        } catch (\Throwable $exception) {
            log_message('warning', 'Avatar resize skipped: ' . $exception->getMessage());
            copy($source, $destination);
        }
        @unlink($source);
        return $name;
    }

    private function removeAvatar(?string $name): void
    {
        if (! $name) return;
        $path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'staff' . DIRECTORY_SEPARATOR . basename($name);
        if (is_file($path)) @unlink($path);
    }

    private function findUser(int $id): array
    {
        $user = $this->users->find($id);
        if (! $user) {
            throw PageNotFoundException::forPageNotFound('Staff account not found.');
        }
        return $user;
    }
}
