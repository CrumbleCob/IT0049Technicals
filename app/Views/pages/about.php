<?= $this->include('layouts/header') ?>
<section class="page-heading">
    <div><p class="eyebrow">Project information</p><h1>About the system</h1><p class="lead">A focused task dashboard built for IT0049 Web System Technologies.</p></div>
</section>

<section class="about-grid">
    <article class="panel prose">
        <h2>Tasks for Today</h2>
        <p>This management system helps a small team view its daily priorities while keeping access to a complete task schedule. The Welcome page filters records using the current date, while the All Tasks page uses the same database table without the daily filter.</p>
        <p>The project demonstrates the Model View Controller structure, relational database migrations, reusable models, controller-based queries, and distinct CodeIgniter views.</p>
    </article>
    <aside class="panel developer-card">
        <p class="eyebrow">Developer</p>
        <div class="avatar avatar-small">I</div>
        <h2>Isabella Beatriz Guevarra</h2>
        <p>Student developer</p>
        <dl><div><dt>Course</dt><dd>IT0049</dd></div><div><dt>Framework</dt><dd>CodeIgniter 4</dd></div></dl>
    </aside>
</section>
<?= $this->include('layouts/footer') ?>
