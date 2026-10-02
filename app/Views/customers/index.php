<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <div><span class="eyebrow">Customer records</span><h1>Customers</h1></div>
    <a class="button" href="<?= site_url('customers/new') ?>">+ New Customer</a>
</div>

<div class="table-wrap">
    <table>
        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th></th></tr></thead>
        <tbody>
        <?php if (! $customers): ?>
            <tr><td colspan="5" class="empty">No customers yet.</td></tr>
        <?php endif ?>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><strong><?= esc($customer['full_name']) ?></strong></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone'] ?: '—') ?></td>
                <td><?= esc($customer['address'] ?: '—') ?></td>
                <td><a class="text-link" href="<?= site_url('customers/edit/' . $customer['id']) ?>">Edit</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
