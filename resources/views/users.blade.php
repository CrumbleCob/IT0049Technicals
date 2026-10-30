@extends('layouts.app')

@section('title', 'Users | Module 6 Technical')

@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">Eloquent collection</span><h1>User Accounts</h1></div>
        <span class="count-badge">{{ $users->count() }} database records</span>
    </div>

    <div class="user-grid">
        @forelse ($users as $user)
            <article class="user-card">
                <div class="avatar">{{ strtoupper(substr($user->full_name, 0, 1)) }}</div>
                <div>
                    <h2>{{ $user->full_name }}</h2>
                    <p>{{ '@' . $user->username }}</p>
                    <small>Stored in the users table</small>
                </div>
                <span class="database-tag">Eloquent</span>
            </article>
        @empty
            <div class="empty-card">No users found. Run the database seeder.</div>
        @endforelse
    </div>
@endsection

