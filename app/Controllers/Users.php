<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Users extends BaseController
{
    private UserModel $users;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->users = new UserModel();
    }

    public function index()
    {
        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $this->users->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            $rules = [
                'username' => 'required|min_length[3]|max_length[50]|alpha_dash|is_unique[users.username]',
                'full_name' => 'required|min_length[2]|max_length[100]',
                'email' => 'permit_empty|valid_email|max_length[120]',
                'password' => 'required|min_length[8]|max_length[72]',
                'password_confirm' => 'required|matches[password]',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->userData();
            $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);
            $this->users->insert($data);
            return redirect()->to('/users')->with('success', 'User added successfully.');
        }

        return view('users/form', ['title' => 'New User', 'user' => null]);
    }

    public function edit(int $id)
    {
        $user = $this->users->find($id);
        if (! $user) {
            throw PageNotFoundException::forPageNotFound('User not found.');
        }

        if ($this->request->is('post')) {
            $rules = [
                'id' => 'required|is_natural_no_zero',
                'username' => "required|min_length[3]|max_length[50]|alpha_dash|is_unique[users.username,id,{$id}]",
                'full_name' => 'required|min_length[2]|max_length[100]',
                'email' => 'permit_empty|valid_email|max_length[120]',
            ];

            $avatar = $this->request->getFile('avatar');
            if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
                $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|ext_in[avatar,jpg,jpeg,png]|max_size[avatar,2048]';
            }
            if ($this->request->getPost('password')) {
                $rules['password'] = 'required|min_length[8]|max_length[72]';
                $rules['password_confirm'] = 'required|matches[password]';
            }

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $data = $this->userData();
            if ($this->request->getPost('password')) {
                $data['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);
            }
            if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {
                $data['avatar'] = $this->prepareAvatar($avatar->getRandomName(), $avatar);
                $this->removeOldAvatar($user['avatar'] ?? null);
            }

            $this->users->update($id, $data);
            if ((int) session('user_id') === $id) {
                session()->set(['username' => $data['username'], 'full_name' => $data['full_name']]);
            }
            return redirect()->to('/users')->with('success', 'User updated successfully.');
        }

        return view('users/form', ['title' => 'Edit User', 'user' => $user]);
    }

    private function userData(): array
    {
        return [
            'username' => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email' => trim((string) $this->request->getPost('email')),
        ];
    }

    private function prepareAvatar(string $filename, $avatar): string
    {
        $temporaryDirectory = WRITEPATH . 'uploads';
        $publicDirectory = FCPATH . 'uploads';
        if (! is_dir($temporaryDirectory)) {
            mkdir($temporaryDirectory, 0775, true);
        }
        if (! is_dir($publicDirectory)) {
            mkdir($publicDirectory, 0775, true);
        }

        $avatar->move($temporaryDirectory, $filename);
        $source = $temporaryDirectory . DIRECTORY_SEPARATOR . $filename;
        $destination = $publicDirectory . DIRECTORY_SEPARATOR . $filename;

        try {
            service('image')
                ->withFile($source)
                ->fit(320, 320, 'center')
                ->save($destination, 85);
        } catch (\Throwable $exception) {
            log_message('warning', 'Avatar resize skipped: ' . $exception->getMessage());
            copy($source, $destination);
        }

        @unlink($source);
        return $filename;
    }

    private function removeOldAvatar(?string $filename): void
    {
        if (! $filename) {
            return;
        }

        $path = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . basename($filename);
        if (is_file($path)) {
            @unlink($path);
        }
    }
}
