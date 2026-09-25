<?= view('layout_header', ['title' => 'Customer Accounts · POS System']) ?>
<section class="heading"><span class="eyebrow">ACCOUNTS</span><h1>Customer Accounts</h1><p>Customers stored in the database.</p></section>
<div class="table-wrap"><table><thead><tr><th>Full name</th><th>Email</th><th>Phone</th></tr></thead><tbody>
<?php foreach ($customers as $customer): ?>
<tr><td><?= esc($customer['full_name']) ?></td><td><?= esc($customer['email']) ?></td><td><?= esc($customer['phone'] ?? '') ?></td></tr>
<?php endforeach; ?>
<?php if ($customers === []): ?><tr><td colspan="3">No customer records found.</td></tr><?php endif; ?>
</tbody></table></div>
<?= view('layout_footer') ?>
