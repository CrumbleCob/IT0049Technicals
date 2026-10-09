<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="form-card sale-card">
    <span class="eyebrow">Inventory-aware checkout</span>
    <h1>Record Sale</h1>
    <p class="muted">Stock decreases only after the transaction is successfully saved.</p>

    <?php if (session('errors')): ?>
        <div class="notice error"><strong>Please check the form:</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach ?></ul></div>
    <?php endif ?>

    <form method="post">
        <?= csrf_field() ?>
        <label>Product *
            <select name="product_id" required>
                <option value="">Choose an available product</option>
                <?php foreach ($products as $product): ?><option value="<?= esc($product['id']) ?>" <?= old('product_id') == $product['id'] ? 'selected' : '' ?>><?= esc($product['name']) ?> — ₱<?= number_format((float) $product['price'], 2) ?> (<?= esc($product['stock_quantity']) ?> available)</option><?php endforeach ?>
            </select>
        </label>
        <label>Customer <span class="hint">Optional; leave blank for a walk-in sale</span>
            <select name="customer_id">
                <option value="">Walk-in customer</option>
                <?php foreach ($customers as $customer): ?><option value="<?= esc($customer['id']) ?>" <?= old('customer_id') == $customer['id'] ? 'selected' : '' ?>><?= esc($customer['full_name']) ?></option><?php endforeach ?>
            </select>
        </label>
        <label>Quantity *<input type="number" name="quantity" min="1" step="1" value="<?= old('quantity', 1) ?>" required></label>
        <div class="form-actions"><button type="submit">Complete Sale</button><a href="<?= site_url('sales') ?>">Cancel</a></div>
    </form>
</div>

<?= $this->endSection() ?>
