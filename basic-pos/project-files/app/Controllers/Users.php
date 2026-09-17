<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            ['username' => 'admin', 'full_name' => 'Alex Dela Cruz', 'role' => 'Administrator'],
            ['username' => 'manager', 'full_name' => 'Bea Flores', 'role' => 'Manager'],
            ['username' => 'cashier01', 'full_name' => 'Chris Mendoza', 'role' => 'Cashier'],
            ['username' => 'cashier02', 'full_name' => 'Dana Lim', 'role' => 'Cashier'],
            ['username' => 'staff01', 'full_name' => 'Evan Torres', 'role' => 'Staff'],
        ];

        return view('templates/header', ['title' => 'User Accounts'])
            . view('users/index', ['users' => $users])
            . view('templates/footer');
    }
}
