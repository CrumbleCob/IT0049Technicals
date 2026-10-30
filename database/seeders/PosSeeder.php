<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        Customer::query()->upsert([
            ['full_name' => 'Alyssa Reyes', 'email' => 'alyssa.reyes@example.com', 'phone' => '0917-221-1045', 'created_at' => $now, 'updated_at' => $now],
            ['full_name' => 'Bianca Santos', 'email' => 'bianca.santos@example.com', 'phone' => '0918-335-2081', 'created_at' => $now, 'updated_at' => $now],
            ['full_name' => 'Carlo Mendoza', 'email' => 'carlo.mendoza@example.com', 'phone' => '0920-447-3196', 'created_at' => $now, 'updated_at' => $now],
            ['full_name' => 'Denise Flores', 'email' => 'denise.flores@example.com', 'phone' => '0921-558-4270', 'created_at' => $now, 'updated_at' => $now],
            ['full_name' => 'Ethan Garcia', 'email' => 'ethan.garcia@example.com', 'phone' => '0922-669-5384', 'created_at' => $now, 'updated_at' => $now],
        ], ['email'], ['full_name', 'phone', 'updated_at']);

        User::query()->upsert([
            ['username' => 'admin_belle', 'full_name' => 'Isabella Guevarra', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'cashier_ana', 'full_name' => 'Ana Villanueva', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'cashier_miguel', 'full_name' => 'Miguel Ramos', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'manager_lea', 'full_name' => 'Lea Navarro', 'created_at' => $now, 'updated_at' => $now],
            ['username' => 'staff_noel', 'full_name' => 'Noel Castillo', 'created_at' => $now, 'updated_at' => $now],
        ], ['username'], ['full_name', 'updated_at']);
    }
}

