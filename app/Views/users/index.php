<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <div><span class="eyebrow">Staff profiles</span><h1>User Accounts</h1></div>
    <a class="button" href="<?= site_url('users/new') ?>">+ New User</a>
</div>

<div class="user-grid">
    <?php if (! $users): ?><p class="empty">No users yet.</p><?php endif ?>
    <?php foreach ($users as $user): ?>
        <?php $avatar = ! empty($user['avatar']) && is_file(FCPATH . 'uploads/' . $user['avatar']) ? base_url('uploads/' . $user['avatar']) : base_url('assets/placeholder.svg'); ?>
        <article class="user-card">
            <img src="<?= esc($avatar) ?>" alt="Avatar for <?= esc($user['full_name']) ?>">
            <div><h2><?= esc($user['full_name']) ?></h2><p>@<?= esc($user['username']) ?></p><small><?= esc($user['email'] ?: 'No email') ?></small></div>
            <a class="text-link" href="<?= site_url('users/edit/' . $user['id']) ?>">Edit</a>
        </article>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>
