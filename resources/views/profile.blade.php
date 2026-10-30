@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<section class="hero compact">
    <p class="eyebrow">Developer profile</p>
    <h1>Hello, {{ $user->full_name }}!</h1>
    <p>This record is retrieved from the users table using Eloquent.</p>
</section>

<section class="profile-card card">
    <div class="avatar">{{ strtoupper(substr($user->full_name, 0, 1)) }}</div>
    <div>
        <p class="label">Full name</p><h2>{{ $user->full_name }}</h2>
        <p class="label">Username</p><p>@{{ $user->username }}</p>
        <p class="label">Email</p><p>{{ $user->email }}</p>
    </div>
</section>
@endsection
