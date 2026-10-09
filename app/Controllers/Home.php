<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home', [
            'title' => 'Welcome',
            'tasks' => (new TaskModel())
                ->where('is_archived', 0)
                ->orderBy('task_date', 'ASC')
                ->findAll(3),
            'taskCount' => (new TaskModel())->where('is_archived', 0)->countAllResults(),
        ]);
    }
}
