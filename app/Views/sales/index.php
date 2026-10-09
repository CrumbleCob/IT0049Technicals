<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <div><span class="eyebrow">Transaction records</span><h1>Sales History</h1></div>
    <a class="button" href="<?= site_url('sales/new') ?>">+ Record Sale</a>
</div>

<div class="table-wrap">
    <table>
        <thead><tr><th>Date</th><th>Product</th><th>Customer</th><th>Staff</th><th>Qty</th><th>Total</th></tr></thead>
        <tbody>
        <?php if (! $sales): ?><tr><td colspan="6" class="empty">No sales recorded yet.</td></tr><?php endif ?>
        <?php foreach ($sales as $sale): ?>
            <tr>
                <td><?= date('M j, Y g:i A', strtotime($sale['created_at'])) ?></td>
                <td><strong><?= esc($sale['product_name']) ?></strong></td>
                <td><?= esc($sale['customer_name'] ?: 'Walk-in') ?></td>
                <td><?= esc($sale['staff_name']) ?></td>
                <td><?= esc($sale['quantity']) ?></td>
                <td><strong>₱<?= number_format((float) $sale['total_price'], 2) ?></strong></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
