<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="about-card">
    <span class="eyebrow">About the system</span>
    <h1>Tasks for Today</h1>
    <p>This CodeIgniter 4 application keeps everyday tasks organized in one simple list. Everyone may view the Welcome, Task List, Profile, and About pages.</p>
    <p>Only authenticated users may create, edit, or delete tasks. Deleting is implemented as soft deletion: the database record stays stored while <code>is_archived</code> changes to true, and archived tasks disappear from public lists.</p>
</section>

<?= $this->endSection() ?>
