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
        <label>Full name *<input type="text" name="full_name" value="<?= old('full_name', $customer['full_name'] ?? '') ?>" required></label>
        <label>Email *<input type="email" name="email" value="<?= old('email', $customer['email'] ?? '') ?>" required></label>
        <div class="form-grid">
            <label>Phone<input type="text" name="phone" value="<?= old('phone', $customer['phone'] ?? '') ?>"></label>
            <label>Address<input type="text" name="address" value="<?= old('address', $customer['address'] ?? '') ?>"></label>
        </div>
        <div class="form-actions"><button type="submit">Save Customer</button><a href="<?= site_url('customers') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
