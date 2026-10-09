<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Module 4 Technical') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="<?= site_url('/') ?>">୨୧ Module 4 Technical</a>
        <nav>
            <a href="<?= site_url('/') ?>">Home</a>
            <?php if (session('is_logged_in')): ?>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('users') ?>">Users</a>
                <span class="staff-name">Hi, <?= esc(session('full_name')) ?>!</span>
                <form class="logout-form" method="post" action="<?= site_url('logout') ?>"><?= csrf_field() ?><button class="nav-button" type="submit">Log Out</button></form>
            <?php else: ?>
                <a href="<?= site_url('login') ?>">Log In</a>
            <?php endif ?>
        </nav>
    </header>

    <main class="page-shell">
        <?php if (session('success')): ?>
            <div class="notice success"><?= esc(session('success')) ?></div>
        <?php endif ?>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>Protected with sessions, filters, bows, and CodeIgniter ♡</footer>
</body>
</html>
