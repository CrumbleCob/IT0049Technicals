<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = [
            ['id' => 1, 'name' => 'Rosie Flores', 'email' => 'rosie@example.com', 'phone' => '0917 123 4567', 'type' => 'Regular'],
            ['id' => 2, 'name' => 'Bella Santos', 'email' => 'bella@example.com', 'phone' => '0918 765 4321', 'type' => 'VIP'],
            ['id' => 3, 'name' => 'Luna Reyes', 'email' => 'luna@example.com', 'phone' => '0919 246 8135', 'type' => 'Regular'],
            ['id' => 4, 'name' => 'Sofia Cruz', 'email' => 'sofia@example.com', 'phone' => '0920 135 7924', 'type' => 'New'],
            ['id' => 5, 'name' => 'Mia Garcia', 'email' => 'mia@example.com', 'phone' => '0921 864 2075', 'type' => 'VIP'],
        ];

        return view('customers', compact('customers'));
    }
}
