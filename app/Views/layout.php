<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Module 3 Technical') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="<?= site_url('/') ?>">୨୧ Module 3 Technical</a>
        <nav>
            <a href="<?= site_url('/') ?>">Home</a>
            <a href="<?= site_url('customers') ?>">Customers</a>
            <a href="<?= site_url('users') ?>">Users</a>
        </nav>
    </header>

    <main class="page-shell">
        <?php if (session('success')): ?>
            <div class="notice success"><?= esc(session('success')) ?></div>
        <?php endif ?>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>Made with bows, blush, and CodeIgniter ♡</footer>
</body>
</html>
