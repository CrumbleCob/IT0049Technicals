<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="login-card">
    <div class="login-bow">୨୧</div>
    <span class="eyebrow">Protected staff access</span>
    <h1>POS Login ♡</h1>
    <p class="muted">Log in before opening any management page.</p>

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
