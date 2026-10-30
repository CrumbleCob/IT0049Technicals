@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<section class="hero compact">
    <p class="eyebrow">Complete schedule</p>
    <h1>All tasks</h1>
    <p>Every seeded task is listed below in date order.</p>
</section>

<section class="card table-card">
    <div class="table-wrap">
        <table>
            <thead><tr><th>Task</th><th>Date</th><th>Status</th></tr></thead>
            <tbody>
            @forelse ($tasks as $task)
                <tr>
                    <td><strong>{{ $task->title }}</strong></td>
                    <td>{{ $task->task_date->format('M d, Y') }}</td>
                    <td><span class="status status-{{ str_replace(' ', '-', $task->status) }}">{{ ucfirst($task->status) }}</span></td>
                </tr>
            @empty
                <tr><td colspan="3" class="empty">No tasks found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
