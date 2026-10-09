<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="profile-card">
    <div class="profile-avatar">୨୧</div>
    <span class="eyebrow">Public profile</span>
    <h1><?= esc($profile['full_name'] ?? 'Task Manager') ?></h1>
    <p>@<?= esc($profile['username'] ?? 'admin') ?></p>
    <p class="muted">A student-built CodeIgniter task manager focused on simple planning, secure management actions, and recoverable task archiving.</p>
</section>

<?= $this->endSection() ?>
