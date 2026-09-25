<?php
namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        return view('users', ['users' => (new UserModel())->findAll()]);
    }
}
