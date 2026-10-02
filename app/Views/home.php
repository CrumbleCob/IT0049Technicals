<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero">
    <span class="eyebrow">POS account manager</span>
    <h1>Sweet, simple, and editable ♡</h1>
    <p>Create and update customer and user records with safe validation and profile-picture uploads.</p>
    <div class="hero-actions">
        <a class="button" href="<?= site_url('customers/new') ?>">+ New Customer</a>
        <a class="button secondary" href="<?= site_url('users/new') ?>">+ New User</a>
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
