<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form-card">
    <span class="eyebrow">Protected management page</span>
    <h1><?= esc($title) ?></h1>
    <p class="muted">Title and task date are required.</p>

    <?php if (session('errors')): ?>
        <div class="notice error"><strong>Please check the form:</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post">
        <?= csrf_field() ?>
        <label>Task title *<input type="text" name="title" maxlength="120" value="<?= old('title', $task['title'] ?? '') ?>" required></label>
        <div class="form-grid">
            <label>Task date *<input type="date" name="task_date" value="<?= old('task_date', $task['task_date'] ?? '') ?>" required></label>
            <label>Priority *
                <select name="priority" required>
                    <?php $selected = old('priority', $task['priority'] ?? 'Medium'); ?>
                    <?php foreach (['Low', 'Medium', 'High'] as $priority): ?>
                        <option value="<?= $priority ?>" <?= $selected === $priority ? 'selected' : '' ?>><?= $priority ?></option>
                    <?php endforeach ?>
                </select>
            </label>
        </div>
        <label>Description<textarea name="description" rows="5" maxlength="1000"><?= old('description', $task['description'] ?? '') ?></textarea></label>
        <div class="form-actions"><button type="submit">Save Task</button><a href="<?= site_url('tasks') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
