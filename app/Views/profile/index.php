<?= $this->include('layouts/header') ?>
<section class="page-heading">
    <div><p class="eyebrow">Demo account</p><h1>User profile</h1><p class="lead">The single user record stored in the database.</p></div>
</section>

<?php if ($user === null): ?>
    <section class="panel empty-state"><h2>No user found</h2><p>Run the database seeder to create the demo account.</p></section>
<?php else: ?>
    <section class="profile-card">
        <div class="avatar"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div>
        <div class="profile-main"><p class="eyebrow">Team member</p><h2><?= esc($user['full_name']) ?></h2><p>@<?= esc($user['username']) ?></p></div>
        <dl class="profile-details">
            <div><dt>Email address</dt><dd><?= esc($user['email']) ?></dd></div>
            <div><dt>Member since</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd></div>
            <div><dt>Account ID</dt><dd>#<?= esc((string) $user['id']) ?></dd></div>
        </dl>
    </section>
<?php endif; ?>
<?= $this->include('layouts/footer') ?>
