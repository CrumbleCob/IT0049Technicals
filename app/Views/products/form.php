<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form-card">
    <span class="eyebrow">Product form</span>
    <h1><?= esc($title) ?></h1>
    <p class="muted">Images are validated, renamed safely, and prepared as display-ready squares.</p>

    <?php if (session('errors')): ?>
        <div class="notice error"><strong>Please check the form:</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <label>Product name *<input type="text" name="name" maxlength="100" value="<?= old('name', $product['name'] ?? '') ?>" required></label>
        <div class="form-grid">
            <label>Price *<input type="number" name="price" min="0" step="0.01" value="<?= old('price', $product['price'] ?? '') ?>" required></label>
            <label>Stock quantity *<input type="number" name="stock_quantity" min="0" step="1" value="<?= old('stock_quantity', $product['stock_quantity'] ?? 0) ?>" required></label>
        </div>
        <label>Product image <span class="hint">JPG, PNG, or WebP; maximum 2 MB</span><input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"></label>
        <div class="form-actions"><button type="submit">Save Product</button><a href="<?= site_url('products') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
