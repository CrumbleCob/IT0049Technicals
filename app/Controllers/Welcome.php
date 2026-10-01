<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Welcome extends BaseController
{
    public function index(): string
    {
        $today = date('Y-m-d');
        $tasks = (new TaskModel())
            ->where('task_date', $today)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('tasks/today', [
            'title' => "Today's Tasks",
            'today' => $today,
            'tasks' => $tasks,
        ]);
    }
}
