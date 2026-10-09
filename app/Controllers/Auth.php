<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form', 'url']);

        if (session()->get('is_logged_in')) {
            return redirect()->to('/');
        }

        if ($this->request->is('post')) {
            $rules = [
                'username' => 'required|max_length[50]',
                'password' => 'required',
            ];

            if (! $this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $user = (new UserModel())
                ->where('username', trim((string) $this->request->getPost('username')))
                ->first();

            $password = (string) $this->request->getPost('password');
            if (! $user || ! password_verify($password, $user['password'])) {
                return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
            }

            session()->regenerate(true);
            session()->set([
                'is_logged_in' => true,
                'user_id' => $user['id'],
                'username' => $user['username'],
                'full_name' => $user['full_name'],
            ]);

            return redirect()->to('/')->with('success', 'Welcome back, ' . $user['full_name'] . '!');
        }

        return view('auth/login', ['title' => 'Staff Login']);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
