<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form-card">
    <span class="eyebrow">User form</span>
    <h1><?= esc($title) ?></h1>
    <p class="muted">Username and full name are required.</p>

    <?php if (session('errors')): ?>
        <div class="notice error"><strong>Please check the form:</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <?php if ($user): ?><input type="hidden" name="id" value="<?= esc($user['id']) ?>"><?php endif ?>
        <label>Username *<input type="text" name="username" value="<?= old('username', $user['username'] ?? '') ?>" required></label>
        <label>Full name *<input type="text" name="full_name" value="<?= old('full_name', $user['full_name'] ?? '') ?>" required></label>
        <label>Email<input type="email" name="email" value="<?= old('email', $user['email'] ?? '') ?>"></label>

        <?php if ($user): ?>
            <label>Profile picture <span class="hint">JPG or PNG, maximum 2 MB</span><input type="file" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png"></label>
        <?php else: ?>
            <p class="hint-box">Save the user first, then choose Edit to add a profile picture.</p>
        <?php endif ?>

        <div class="form-actions"><button type="submit">Save User</button><a href="<?= site_url('users') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
