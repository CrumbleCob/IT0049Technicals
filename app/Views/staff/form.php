<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form-card">
    <span class="eyebrow">Staff form</span>
    <h1><?= esc($title) ?></h1>
    <p class="muted">Passwords are hashed. Avatars are validated, randomly renamed, and prepared for display.</p>

    <?php if (session('errors')): ?>
        <div class="notice error"><strong>Please check the form:</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label>Username *<input type="text" name="username" maxlength="50" value="<?= old('username', $user['username'] ?? '') ?>" required></label>
        <label>Full name *<input type="text" name="full_name" maxlength="100" value="<?= old('full_name', $user['full_name'] ?? '') ?>" required></label>
        <div class="form-grid">
            <label><?= $user ? 'New password' : 'Password *' ?><span class="hint"><?= $user ? 'Leave blank to keep the current password' : 'At least 8 characters' ?></span><input type="password" name="password" minlength="8" maxlength="72" autocomplete="new-password" <?= $user ? '' : 'required' ?>></label>
            <label>Confirm password <?= $user ? '' : '*' ?><input type="password" name="password_confirm" minlength="8" maxlength="72" autocomplete="new-password" <?= $user ? '' : 'required' ?>></label>
        </div>
        <label>Avatar <span class="hint">JPG, PNG, or WebP; maximum 2 MB</span><input type="file" name="avatar" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"></label>
        <div class="form-actions"><button type="submit">Save Staff Account</button><a href="<?= site_url('staff') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
