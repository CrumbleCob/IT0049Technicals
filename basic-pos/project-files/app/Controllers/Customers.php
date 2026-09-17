<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            ['full_name' => 'Ana Reyes', 'email' => 'ana@example.com', 'phone' => '0917-111-1111'],
            ['full_name' => 'Ben Santos', 'email' => 'ben@example.com', 'phone' => '0917-222-2222'],
            ['full_name' => 'Carla Cruz', 'email' => 'carla@example.com', 'phone' => '0917-333-3333'],
            ['full_name' => 'Daniel Garcia', 'email' => 'daniel@example.com', 'phone' => '0917-444-4444'],
            ['full_name' => 'Ella Ramos', 'email' => 'ella@example.com', 'phone' => '0917-555-5555'],
        ];

        return view('templates/header', ['title' => 'Customer Accounts'])
            . view('customers/index', ['customers' => $customers])
            . view('templates/footer');
    }
}
