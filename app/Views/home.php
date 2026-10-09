<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero">
    <span class="eyebrow">Secure POS account manager</span>
    <h1>Sweet, simple, and protected ♡</h1>
    <p>Customer and user records now require a verified staff session before they can be managed.</p>
    <div class="hero-actions">
        <?php if (session('is_logged_in')): ?>
            <a class="button" href="<?= site_url('customers/new') ?>">+ New Customer</a>
            <a class="button secondary" href="<?= site_url('users/new') ?>">+ New User</a>
        <?php else: ?>
            <a class="button" href="<?= site_url('login') ?>">Staff Login</a>
        <?php endif ?>
    </div>
</section>

<section class="stats">
    <a class="stat-card" href="<?= site_url('customers') ?>">
        <span>Customers</span>
        <strong><?= esc($customerCount) ?></strong>
        <small>View customer records →</small>
    </a>
    <a class="stat-card" href="<?= site_url('users') ?>">
        <span>User Accounts</span>
        <strong><?= esc($userCount) ?></strong>
        <small>View user profiles →</small>
    </a>
</section>

<?= $this->endSection() ?>
