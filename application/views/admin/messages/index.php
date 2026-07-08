<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Messages</h1><div class="breadcrumb"><?= count($items) ?> message(s)</div></div>
  <a href="<?= site_url('admin/messages/export') ?>" class="btn btn-ghost"><i class="bi bi-download"></i> Export CSV</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Status</th><th>Name</th><th>Email</th><th>Subject</th><th>Received</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="6" class="empty"><i class="bi bi-inbox"></i> No messages yet</td></tr>
      <?php else: foreach ($items as $m): ?>
      <tr style="<?= $m['is_read'] ? '' : 'font-weight:600' ?>">
        <td>
          <?php if (!$m['is_read']): ?><span class="badge badge-blue">New</span>
          <?php elseif ($m['is_replied']): ?><span class="badge badge-green">Replied</span>
          <?php else: ?><span class="badge badge-gray">Read</span><?php endif; ?>
        </td>
        <td><?= e($m['name']) ?></td>
        <td><?= e($m['email']) ?></td>
        <td><?= e($m['subject'] ?: '—') ?></td>
        <td><?= format_date($m['created_at'], 'd M Y H:i') ?></td>
        <td class="actions">
          <a href="<?= site_url('admin/messages/view/'.$m['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-eye"></i></a>
          <?= form_open('admin/messages/delete/'.$m['id'], array('data-confirm'=>'Delete?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
