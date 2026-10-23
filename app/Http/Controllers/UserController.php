<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = [
            ['id' => 1, 'name' => 'Isabella Admin', 'username' => 'admin', 'email' => 'admin@example.com', 'role' => 'Administrator', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Colette Dela Cruz', 'username' => 'colette', 'email' => 'colette@example.com', 'role' => 'Cashier', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Amelia Santos', 'username' => 'amelia', 'email' => 'amelia@example.com', 'role' => 'Manager', 'status' => 'Active'],
            ['id' => 4, 'name' => 'Clara Reyes', 'username' => 'clara', 'email' => 'clara@example.com', 'role' => 'Cashier', 'status' => 'Inactive'],
            ['id' => 5, 'name' => 'Elise Navarro', 'username' => 'elise', 'email' => 'elise@example.com', 'role' => 'Cashier', 'status' => 'Active'],
        ];

        return view('users', compact('users'));
    }
}
