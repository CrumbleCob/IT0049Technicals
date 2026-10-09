<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero">
    <span class="eyebrow">Your soft pink task space</span>
    <h1>What will you finish today? ♡</h1>
    <p>View upcoming tasks freely. Log in when you need to create, edit, or archive a task.</p>
    <div class="hero-actions">
        <?php if (session('is_logged_in')): ?>
            <a class="button" href="<?= site_url('tasks/new') ?>">+ New Task</a>
            <a class="button secondary" href="<?= site_url('tasks') ?>">View All Tasks</a>
        <?php else: ?>
            <a class="button" href="<?= site_url('login') ?>">Staff Login</a>
            <a class="button secondary" href="<?= site_url('tasks') ?>">View Tasks</a>
        <?php endif ?>
    </div>
</section>

<section class="section-heading">
    <div><span class="eyebrow">Coming up</span><h2><?= esc($taskCount) ?> active task<?= $taskCount === 1 ? '' : 's' ?></h2></div>
    <a class="text-link" href="<?= site_url('tasks') ?>">Open task list →</a>
</section>

<section class="task-grid">
    <?php if (! $tasks): ?><p class="empty">Nothing scheduled yet. Enjoy the calm ♡</p><?php endif ?>
    <?php foreach ($tasks as $task): ?>
        <article class="task-card">
            <span class="priority priority-<?= strtolower(esc($task['priority'])) ?>"><?= esc($task['priority']) ?></span>
            <h2><?= esc($task['title']) ?></h2>
            <p><?= esc($task['description'] ?: 'No description provided.') ?></p>
            <time datetime="<?= esc($task['task_date']) ?>"><?= date('F j, Y', strtotime($task['task_date'])) ?></time>
        </article>
    <?php endforeach ?>
</section>

<?= $this->endSection() ?>
