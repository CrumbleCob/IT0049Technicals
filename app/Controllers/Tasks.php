<?php

namespace App\Controllers;

use App\Models\TaskModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    private TaskModel $tasks;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->tasks = new TaskModel();
    }

    public function index()
    {
        return view('tasks/index', [
            'title' => 'Task List',
            'tasks' => $this->tasks
                ->where('is_archived', 0)
                ->orderBy('task_date', 'ASC')
                ->findAll(),
        ]);
    }

    public function create()
    {
        if ($this->request->is('post')) {
            if (! $this->validate($this->rules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $this->tasks->insert($this->taskData());
            return redirect()->to('/tasks')->with('success', 'Task added successfully.');
        }

        return view('tasks/form', ['title' => 'New Task', 'task' => null]);
    }

    public function edit(int $id)
    {
        $task = $this->tasks->where('is_archived', 0)->find($id);
        if (! $task) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        if ($this->request->is('post')) {
            if (! $this->validate($this->rules())) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $this->tasks->update($id, $this->taskData());
            return redirect()->to('/tasks')->with('success', 'Task updated successfully.');
        }

        return view('tasks/form', ['title' => 'Edit Task', 'task' => $task]);
    }

    public function archive(int $id)
    {
        $task = $this->tasks->where('is_archived', 0)->find($id);
        if (! $task) {
            throw PageNotFoundException::forPageNotFound('Task not found.');
        }

        $this->tasks->update($id, ['is_archived' => 1]);
        return redirect()->to('/tasks')->with('success', 'Task archived successfully.');
    }

    private function rules(): array
    {
        return [
            'title' => 'required|min_length[2]|max_length[120]',
            'task_date' => 'required|valid_date[Y-m-d]',
            'description' => 'permit_empty|max_length[1000]',
            'priority' => 'required|in_list[Low,Medium,High]',
        ];
    }

    private function taskData(): array
    {
        return [
            'title' => trim((string) $this->request->getPost('title')),
            'task_date' => (string) $this->request->getPost('task_date'),
            'description' => trim((string) $this->request->getPost('description')),
            'priority' => (string) $this->request->getPost('priority'),
        ];
    }
}
