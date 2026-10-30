<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TasksForTodaySeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'isabella',
            'full_name' => 'Isabella Beatriz Guevarra',
            'email' => 'isabella@example.com',
        ]);

        $yesterday = today()->subDay();
        $today = today();
        $tomorrow = today()->addDay();

        $tasks = [
            ['title' => 'Review Laravel routes', 'status' => 'completed', 'task_date' => $yesterday],
            ['title' => 'Plan database fields', 'status' => 'completed', 'task_date' => $yesterday],
            ['title' => 'Finish migration files', 'status' => 'in progress', 'task_date' => $today],
            ['title' => 'Check Eloquent models', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Design the pink task pages', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Test today date filtering', 'status' => 'pending', 'task_date' => $today],
            ['title' => 'Prepare GitHub submission', 'status' => 'pending', 'task_date' => $tomorrow],
            ['title' => 'Publish the hosted website', 'status' => 'pending', 'task_date' => $tomorrow],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
