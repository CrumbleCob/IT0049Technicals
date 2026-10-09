<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="login-card">
    <div class="login-bow">୨୧</div>
    <span class="eyebrow">Authorized staff only</span>
    <h1>Welcome back ♡</h1>
    <p class="muted">Log in to create, edit, or archive tasks.</p>

    <?php if (session('error')): ?>
        <div class="notice error"><?= esc(session('error')) ?></div>
    <?php endif ?>
    <?php if (session('errors')): ?>
        <div class="notice error"><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>
        <label>Username<input type="text" name="username" value="<?= old('username') ?>" autocomplete="username" required autofocus></label>
        <label>Password<input type="password" name="password" autocomplete="current-password" required></label>
        <button type="submit">Log In</button>
    </form>

    <p class="demo-login"><strong>Demo:</strong> admin / Pink1234</p>
</section>

<?= $this->endSection() ?>
