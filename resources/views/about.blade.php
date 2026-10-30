@extends('layouts.app')

@section('title', 'About | Module 6 Technical')

@section('content')
    <section class="content-card">
        <span class="eyebrow">How the application works</span>
        <h1>Laravel turns tables into objects ♡</h1>
        <p>The schema is reproducible, sample data is inserted automatically, and Eloquent retrieves each row as a PHP object for the Blade views.</p>

        <div class="flow-grid">
            <article><strong>1 · Migration</strong><code>database/migrations</code><p>Creates the customers and users tables.</p></article>
            <article><strong>2 · Seeder</strong><code>database/seeders</code><p>Populates five records in each table.</p></article>
            <article><strong>3 · Model</strong><code>app/Models</code><p>Represents each table through Eloquent.</p></article>
            <article><strong>4 · Controller</strong><code>app/Http/Controllers</code><p>Retrieves collections through the models.</p></article>
            <article><strong>5 · Blade</strong><code>resources/views</code><p>Loops through the Eloquent objects and displays them.</p></article>
        </div>
    </section>
@endsection

