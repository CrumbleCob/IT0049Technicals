<?= $this->include('layouts/header') ?>
<section class="page-heading">
    <div>
        <p class="eyebrow">Complete schedule</p>
        <h1>All tasks</h1>
        <p class="lead">Every task is listed below in date order.</p>
    </div>
    <span class="record-count"><?= count($tasks) ?> records</span>
</section>

<section class="panel table-panel">
    <?php if ($tasks === []): ?>
        <div class="empty-state"><h2>No tasks found</h2><p>Run the database seeder to add the demo records.</p></div>
    <?php else: ?>
        <div class="table-scroll">
            <table>
                <thead><tr><th scope="col">Task</th><th scope="col">Date</th><th scope="col">Status</th></tr></thead>
                <tbody>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><strong><?= esc($task['title']) ?></strong></td>
                        <td><?= esc(date('M j, Y', strtotime($task['task_date']))) ?></td>
                        <td><span class="status-badge status-<?= esc(str_replace(' ', '-', $task['status'])) ?>"><?= esc(ucwords($task['status'])) ?></span></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
<?= $this->include('layouts/footer') ?>
