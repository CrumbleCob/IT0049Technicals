@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="hero compact">
    <p class="eyebrow">About the project</p>
    <h1>A soft and simple Laravel task manager</h1>
    <p>This TSA3 application uses migrations, seeders, Eloquent, controllers, routes, and Blade views.</p>
</section>

<section class="card about-grid">
    <div><p class="label">Developer</p><h2>Isabella Beatriz Guevarra</h2></div>
    <div><p class="label">Framework</p><h2>Laravel 13</h2></div>
    <div><p class="label">Database</p><h2>SQLite</h2></div>
</section>
@endsection
