<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <div><span class="eyebrow">Inventory management</span><h1>Products</h1></div>
    <a class="button" href="<?= site_url('products/new') ?>">+ New Product</a>
</div>

<div class="product-grid">
    <?php if (! $products): ?><p class="empty">No active products yet.</p><?php endif ?>
    <?php foreach ($products as $product): ?>
        <?php $image = ! empty($product['image']) && is_file(FCPATH . 'uploads/products/' . $product['image']) ? base_url('uploads/products/' . $product['image']) : base_url('assets/placeholder.svg'); ?>
        <article class="product-card">
            <img src="<?= esc($image) ?>" alt="Image of <?= esc($product['name']) ?>">
            <div class="card-body">
                <span class="stock <?= (int) $product['stock_quantity'] === 0 ? 'out' : '' ?>"><?= esc($product['stock_quantity']) ?> in stock</span>
                <h2><?= esc($product['name']) ?></h2>
                <strong class="price">₱<?= number_format((float) $product['price'], 2) ?></strong>
                <div class="card-actions"><a class="text-link" href="<?= site_url('products/edit/' . $product['id']) ?>">Edit</a><form method="post" action="<?= site_url('products/archive/' . $product['id']) ?>" onsubmit="return confirm('Archive this product?')"><?= csrf_field() ?><button class="link-danger" type="submit">Archive</button></form></div>
            </div>
        </article>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>
