<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <div><span class="eyebrow">Authenticated users</span><h1>Staff Accounts</h1></div>
    <a class="button" href="<?= site_url('staff/new') ?>">+ New Staff</a>
</div>

<div class="user-grid">
    <?php if (! $users): ?><p class="empty">No staff accounts yet.</p><?php endif ?>
    <?php foreach ($users as $user): ?>
        <?php $avatar = ! empty($user['avatar']) && is_file(FCPATH . 'uploads/staff/' . $user['avatar']) ? base_url('uploads/staff/' . $user['avatar']) : base_url('assets/placeholder.svg'); ?>
        <article class="user-card">
            <img src="<?= esc($avatar) ?>" alt="Avatar for <?= esc($user['full_name']) ?>">
            <div><h2><?= esc($user['full_name']) ?></h2><p>@<?= esc($user['username']) ?></p></div>
            <div class="card-actions"><a class="text-link" href="<?= site_url('staff/edit/' . $user['id']) ?>">Edit</a><form method="post" action="<?= site_url('staff/delete/' . $user['id']) ?>" onsubmit="return confirm('Delete this staff account?')"><?= csrf_field() ?><button class="link-danger" type="submit">Delete</button></form></div>
        </article>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>
