@extends('layouts.app')

@section('title', 'User Accounts | Laravel POS')

@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">Static PHP array</span><h1>User Accounts</h1></div>
        <span class="count-badge">{{ count($users) }} records</span>
    </div>

    <div class="user-grid">
        @foreach ($users as $user)
            <article class="user-card">
                <div class="avatar">{{ strtoupper(substr($user['name'], 0, 1)) }}</div>
                <div>
                    <h2>{{ $user['name'] }}</h2>
                    <p>{{ '@' . $user['username'] }}</p>
                    <small>{{ $user['email'] }}</small>
                </div>
                <div class="user-meta">
                    <span class="pill">{{ $user['role'] }}</span>
                    <span class="status {{ strtolower($user['status']) }}">{{ $user['status'] }}</span>
                </div>
            </article>
        @endforeach
    </div>
@endsection
