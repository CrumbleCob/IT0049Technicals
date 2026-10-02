<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('customers')->countAllResults() === 0) {
            $this->db->table('customers')->insertBatch([
                ['full_name' => 'Rosie Flores', 'email' => 'rosie@example.com', 'phone' => '0917 123 4567', 'address' => 'Manila', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
                ['full_name' => 'Bella Santos', 'email' => 'bella@example.com', 'phone' => '0918 765 4321', 'address' => 'Quezon City', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ]);
        }

        if ($this->db->table('users')->countAllResults() === 0) {
            $this->db->table('users')->insertBatch([
                ['username' => 'admin', 'full_name' => 'Pink Admin', 'email' => 'admin@example.com', 'avatar' => null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
                ['username' => 'cashier', 'full_name' => 'Coquette Cashier', 'email' => 'cashier@example.com', 'avatar' => null, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ]);
        }
    }
}
