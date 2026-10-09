<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Midterm Project POS') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="<?= site_url('/') ?>">୨୧ Midterm Project POS</a>
        <?php if (session('is_logged_in')): ?>
            <nav>
                <a href="<?= site_url('/') ?>">Dashboard</a>
                <a href="<?= site_url('products') ?>">Products</a>
                <a href="<?= site_url('customers') ?>">Customers</a>
                <a href="<?= site_url('staff') ?>">Staff</a>
                <a href="<?= site_url('sales/new') ?>">Record Sale</a>
                <a href="<?= site_url('sales') ?>">Sales</a>
                <form class="logout-form" method="post" action="<?= site_url('logout') ?>">
                    <?= csrf_field() ?><button class="nav-button" type="submit">Log Out</button>
                </form>
            </nav>
        <?php endif ?>
    </header>

    <main class="page-shell">
        <?php if (session('success')): ?><div class="notice success"><?= esc(session('success')) ?></div><?php endif ?>
        <?php if (session('error')): ?><div class="notice error"><?= esc(session('error')) ?></div><?php endif ?>
        <?= $this->renderSection('content') ?>
    </main>

    <footer>Secure sales, tidy stock, and a little pink bow ♡</footer>
</body>
</html>
