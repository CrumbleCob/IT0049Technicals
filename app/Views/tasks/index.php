<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <div><span class="eyebrow">Public read-only page</span><h1>Task List</h1></div>
    <?php if (session('is_logged_in')): ?><a class="button" href="<?= site_url('tasks/new') ?>">+ New Task</a><?php endif ?>
</div>

<?php if (! session('is_logged_in')): ?>
    <div class="notice info">You can view tasks without logging in. Log in to create, edit, or archive them.</div>
<?php endif ?>

<div class="table-wrap">
    <table>
        <thead><tr><th>Task</th><th>Date</th><th>Priority</th><th>Description</th><?php if (session('is_logged_in')): ?><th>Actions</th><?php endif ?></tr></thead>
        <tbody>
        <?php if (! $tasks): ?><tr><td class="empty" colspan="<?= session('is_logged_in') ? 5 : 4 ?>">No active tasks found.</td></tr><?php endif ?>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><strong><?= esc($task['title']) ?></strong></td>
                <td><?= date('M j, Y', strtotime($task['task_date'])) ?></td>
                <td><span class="priority priority-<?= strtolower(esc($task['priority'])) ?>"><?= esc($task['priority']) ?></span></td>
                <td><?= esc($task['description'] ?: '—') ?></td>
                <?php if (session('is_logged_in')): ?>
                    <td class="actions">
                        <a class="text-link" href="<?= site_url('tasks/edit/' . $task['id']) ?>">Edit</a>
                        <form method="post" action="<?= site_url('tasks/delete/' . $task['id']) ?>" onsubmit="return confirm('Archive this task?');">
                            <?= csrf_field() ?>
                            <button class="archive-button" type="submit">Delete</button>
                        </form>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
