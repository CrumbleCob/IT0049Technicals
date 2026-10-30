@extends('layouts.app')

@section('title', 'Home | Module 6 Technical')

@section('content')
    <section class="hero">
        <span class="eyebrow">From arrays to Eloquent</span>
        <h1>A real database, wrapped in pink ♡</h1>
        <p>This Laravel POS now uses migrations, an SQLite database, a seeder, Eloquent models, controllers, and Blade views.</p>
        <div class="hero-actions">
            <a class="button" href="{{ route('customers.index') }}">View {{ $customerCount }} Customers</a>
            <a class="button secondary" href="{{ route('users.index') }}">View {{ $userCount }} Users</a>
        </div>
    </section>

    <section class="feature-grid">
        <a class="feature-card" href="{{ route('about') }}"><span>01</span><h2>Database Flow</h2><p>See how migrations, seeders, models, controllers, and Blade connect.</p></a>
        <a class="feature-card" href="{{ route('customers.index') }}"><span>02</span><h2>Customers</h2><p>Browse records retrieved from the customers table.</p></a>
        <a class="feature-card" href="{{ route('users.index') }}"><span>03</span><h2>Users</h2><p>Browse records retrieved from the users table.</p></a>
    </section>
@endsection

