<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('users')->countAllResults() === 0) {
            $password = password_hash('Pink1234', PASSWORD_DEFAULT);
            $this->db->table('users')->insert([
                'username' => 'admin',
                'password' => $password,
                'full_name' => 'Task Manager',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        if ($this->db->table('tasks')->countAllResults() === 0) {
            $this->db->table('tasks')->insertBatch([
                ['title' => 'Finish Web Systems activity', 'description' => 'Review the requirements before submission.', 'task_date' => date('Y-m-d', strtotime('+1 day')), 'priority' => 'High', 'is_archived' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
                ['title' => 'Prepare class notes', 'description' => 'Organize notes for the next lesson.', 'task_date' => date('Y-m-d', strtotime('+3 days')), 'priority' => 'Medium', 'is_archived' => 0, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
                ['title' => 'Archived sample task', 'description' => 'This record demonstrates soft deletion.', 'task_date' => date('Y-m-d'), 'priority' => 'Low', 'is_archived' => 1, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ]);
        }
    }
}
