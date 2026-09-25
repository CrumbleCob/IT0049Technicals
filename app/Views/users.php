<?= view('layout_header', ['title' => 'User Accounts · POS System']) ?>
<section class="heading"><span class="eyebrow">ACCOUNTS</span><h1>User Accounts</h1><p>Staff accounts stored in the database.</p></section>
<div class="table-wrap"><table><thead><tr><th>Username</th><th>Full name</th><th>Created at</th></tr></thead><tbody>
<?php foreach ($users as $user): ?>
<tr><td><?= esc($user['username']) ?></td><td><?= esc($user['full_name']) ?></td><td><?= esc($user['created_at']) ?></td></tr>
<?php endforeach; ?>
<?php if ($users === []): ?><tr><td colspan="3">No user records found.</td></tr><?php endif; ?>
</tbody></table></div>
<?= view('layout_footer') ?>
