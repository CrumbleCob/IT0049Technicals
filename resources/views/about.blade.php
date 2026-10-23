@extends('layouts.app')

@section('title', 'About | Laravel POS')

@section('content')
    <section class="content-card">
        <span class="eyebrow">About the project</span>
        <h1>Laravel uses the same MVC ideas ♡</h1>
        <p>The route selects a controller method, the controller prepares the data, and the Blade view displays the response.</p>

        <div class="mvc-grid">
            <article><strong>Route</strong><code>routes/web.php</code><p>Connects each URL to a controller method.</p></article>
            <article><strong>Controller</strong><code>app/Http/Controllers</code><p>Contains page logic and the temporary static arrays.</p></article>
            <article><strong>Blade View</strong><code>resources/views</code><p>Renders the HTML and loops through records with @@foreach.</p></article>
        </div>
    </section>
@endsection
