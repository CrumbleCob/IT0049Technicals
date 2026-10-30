<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function today(): View
    {
        $tasks = Task::query()
            ->whereDate('task_date', today())
            ->orderBy('title')
            ->get();

        return view('welcome', compact('tasks'));
    }

    public function index(): View
    {
        $tasks = Task::query()
            ->orderBy('task_date')
            ->orderBy('title')
            ->get();

        return view('tasks', compact('tasks'));
    }
}
