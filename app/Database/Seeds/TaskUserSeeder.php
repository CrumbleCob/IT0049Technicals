<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskUserSeeder extends Seeder
{
    public function run(): void
    {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow = date('Y-m-d', strtotime('+1 day'));
        $nextWeek = date('Y-m-d', strtotime('+7 days'));
        $now = date('Y-m-d H:i:s');

        $this->db->table('tasks')->truncate();
        $this->db->table('users')->truncate();

        $this->db->table('tasks')->insertBatch([
            ['title' => 'Review the project requirements', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $now],
            ['title' => 'Prepare the database schema', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $now],
            ['title' => 'Check priority emails', 'status' => 'completed', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Attend the daily team meeting', 'status' => 'in progress', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Finish the dashboard layout', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Test the task date filter', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Update the project documentation', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $now],
            ['title' => 'Present the working application', 'status' => 'pending', 'task_date' => $nextWeek, 'created_at' => $now],
        ]);

        $this->db->table('users')->insert([
            'username'   => 'isabella',
            'full_name'  => 'Isabella Beatriz Guevarra',
            'email'      => 'isabella@example.com',
            'created_at' => $now,
        ]);
    }
}
