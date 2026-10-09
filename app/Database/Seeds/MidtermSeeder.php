<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MidtermSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        if ($this->db->table('products')->countAllResults() === 0) {
            $this->db->table('products')->insertBatch([
                ['name' => 'Strawberry Notebook', 'price' => 129.00, 'stock_quantity' => 24, 'image' => null, 'is_archived' => 0, 'created_at' => $now],
                ['name' => 'Pink Gel Pen', 'price' => 35.50, 'stock_quantity' => 50, 'image' => null, 'is_archived' => 0, 'created_at' => $now],
                ['name' => 'Ribbon Pouch', 'price' => 249.00, 'stock_quantity' => 12, 'image' => null, 'is_archived' => 0, 'created_at' => $now],
            ]);
        }

        if ($this->db->table('customers')->countAllResults() === 0) {
            $this->db->table('customers')->insertBatch([
                ['full_name' => 'Rosie Flores', 'email' => 'rosie@example.com', 'phone' => '09171234567', 'created_at' => $now],
                ['full_name' => 'Bella Santos', 'email' => 'bella@example.com', 'phone' => '09187654321', 'created_at' => $now],
            ]);
        }

        if ($this->db->table('users')->countAllResults() === 0) {
            $password = password_hash('Pink1234', PASSWORD_DEFAULT);
            $this->db->table('users')->insertBatch([
                ['username' => 'admin', 'full_name' => 'Pink Admin', 'password' => $password, 'avatar' => null, 'created_at' => $now],
                ['username' => 'cashier', 'full_name' => 'Coquette Cashier', 'password' => $password, 'avatar' => null, 'created_at' => $now],
            ]);
        }
    }
}
