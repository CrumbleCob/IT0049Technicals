<?= $this->include('layouts/header') ?>
<?php
$completed = count(array_filter($tasks, static fn ($task) => $task['status'] === 'completed'));
$inProgress = count(array_filter($tasks, static fn ($task) => $task['status'] === 'in progress'));
$pending = count($tasks) - $completed - $inProgress;
?>
<section class="hero">
    <div>
        <p class="eyebrow"><?= esc(date('l, F j, Y', strtotime($today))) ?></p>
        <h1>Good day, Isabella.</h1>
        <p class="lead">Here is what needs your attention today.</p>
    </div>
    <a class="button button-secondary" href="<?= site_url('tasks') ?>">View all tasks</a>
</section>

<section class="stats" aria-label="Today's task summary">
    <article class="stat-card"><strong><?= count($tasks) ?></strong><span>Total today</span></article>
    <article class="stat-card"><strong><?= $completed ?></strong><span>Completed</span></article>
    <article class="stat-card"><strong><?= $inProgress ?></strong><span>In progress</span></article>
    <article class="stat-card"><strong><?= $pending ?></strong><span>Pending</span></article>
</section>

<section class="panel">
    <div class="panel-heading">
        <div>
            <p class="eyebrow">Daily focus</p>
            <h2>Today's tasks</h2>
        </div>
        <span class="record-count"><?= count($tasks) ?> task<?= count($tasks) === 1 ? '' : 's' ?></span>
    </div>

    <?php if ($tasks === []): ?>
        <div class="empty-state">
            <div class="empty-icon">✓</div>
            <h3>Nothing scheduled today</h3>
            <p>You are all caught up. Check the full task list for upcoming work.</p>
        </div>
    <?php else: ?>
        <div class="task-list">
            <?php foreach ($tasks as $task): ?>
                <article class="task-item">
                    <span class="task-indicator status-<?= esc(str_replace(' ', '-', $task['status'])) ?>"></span>
                    <div class="task-copy">
                        <h3><?= esc($task['title']) ?></h3>
                        <p>Scheduled for today</p>
                    </div>
                    <span class="status-badge status-<?= esc(str_replace(' ', '-', $task['status'])) ?>"><?= esc(ucwords($task['status'])) ?></span>
                </article>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<?= $this->include('layouts/footer') ?>
