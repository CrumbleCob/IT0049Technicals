<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form-card">
    <span class="eyebrow">Customer form</span>
    <h1><?= esc($title) ?></h1>
    <p class="muted">Fields marked with * are required.</p>

    <?php if (session('errors')): ?>
        <div class="notice error"><strong>Please check the form:</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post">
        <?= csrf_field() ?>
        <label>Full name *<input type="text" name="full_name" maxlength="100" value="<?= old('full_name', $customer['full_name'] ?? '') ?>" required></label>
        <label>Email *<input type="email" name="email" maxlength="100" value="<?= old('email', $customer['email'] ?? '') ?>" required></label>
        <label>Phone<input type="text" name="phone" maxlength="20" value="<?= old('phone', $customer['phone'] ?? '') ?>"></label>
        <div class="form-actions"><button type="submit">Save Customer</button><a href="<?= site_url('customers') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
