<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<section class="hero">
    <span class="eyebrow">Complete point-of-sale system</span>
    <h1>Hello, <?= esc(session('full_name')) ?> ♡</h1>
    <p>Manage products, customers, staff accounts, inventory, and sales from one protected dashboard.</p>
    <div class="hero-actions">
        <a class="button" href="<?= site_url('sales/new') ?>">Record a Sale</a>
        <a class="button secondary" href="<?= site_url('products/new') ?>">Add Product</a>
    </div>
</section>

<section class="stats four">
    <a class="stat-card" href="<?= site_url('products') ?>"><span>Products</span><strong><?= esc($productCount) ?></strong><small>Active inventory →</small></a>
    <a class="stat-card" href="<?= site_url('customers') ?>"><span>Customers</span><strong><?= esc($customerCount) ?></strong><small>Customer records →</small></a>
    <a class="stat-card" href="<?= site_url('staff') ?>"><span>Staff</span><strong><?= esc($staffCount) ?></strong><small>Secure accounts →</small></a>
    <a class="stat-card" href="<?= site_url('sales') ?>"><span>Sales</span><strong><?= esc($saleCount) ?></strong><small>₱<?= number_format($revenue, 2) ?> total →</small></a>
</section>

<?= $this->endSection() ?>
