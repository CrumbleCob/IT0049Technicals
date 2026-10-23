@extends('layouts.app')

@section('title', 'Home | Laravel POS')

@section('content')
    <section class="hero">
        <span class="eyebrow">Laravel POS foundations</span>
        <h1>Sweet, simple, and built with Blade ♡</h1>
        <p>This four-page application demonstrates Laravel routes, controllers, Blade views, navigation, and static PHP arrays.</p>
        <div class="hero-actions">
            <a class="button" href="{{ route('customers.index') }}">View Customers</a>
            <a class="button secondary" href="{{ route('users.index') }}">View Users</a>
        </div>
    </section>

    <section class="feature-grid">
        <a class="feature-card" href="{{ route('about') }}"><span>01</span><h2>About</h2><p>See how MVC responsibilities connect.</p></a>
        <a class="feature-card" href="{{ route('customers.index') }}"><span>02</span><h2>Customers</h2><p>Browse five sample customer accounts.</p></a>
        <a class="feature-card" href="{{ route('users.index') }}"><span>03</span><h2>Users</h2><p>Browse five sample user accounts.</p></a>
    </section>
@endsection
