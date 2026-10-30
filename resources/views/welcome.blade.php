@extends('layouts.app')

@section('title', "Today's Tasks")

@section('content')
<section class="hero">
    <p class="eyebrow">{{ today()->format('l, F j, Y') }}</p>
    <h1>Today’s little to-do list</h1>
    <p>Only tasks scheduled for today appear on this page.</p>
</section>

<section class="card">
    <div class="section-heading">
        <h2>Tasks for today</h2>
        <span>{{ $tasks->count() }} task{{ $tasks->count() === 1 ? '' : 's' }}</span>
    </div>
    <div class="task-list">
        @forelse ($tasks as $task)
            <article class="task-item">
                <div><span class="bow">୨୧</span><strong>{{ $task->title }}</strong></div>
                <span class="status status-{{ str_replace(' ', '-', $task->status) }}">{{ ucfirst($task->status) }}</span>
            </article>
        @empty
            <p class="empty">No tasks are scheduled for today.</p>
        @endforelse
    </div>
</section>
@endsection
