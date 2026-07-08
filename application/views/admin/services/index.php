<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Services</h1><div class="breadcrumb"><?= count($items) ?> service(s)</div></div>
  <a href="<?= site_url('admin/services/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Service</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Icon</th><th>Title</th><th>Description</th><th>Order</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="5" class="empty"><i class="bi bi-gear"></i> No services yet</td></tr>
      <?php else: foreach ($items as $s): ?>
      <tr>
        <td style="font-size:1.4rem"><i class="bi <?= e($s['icon']) ?>"></i></td>
        <td><?= e($s['title']) ?></td>
        <td><?= e(excerpt($s['description'], 70)) ?></td>
        <td><?= (int)$s['sort_order'] ?></td>
        <td class="actions">
          <a href="<?= site_url('admin/services/form/'.$s['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/services/delete/'.$s['id'], array('data-confirm'=>'Delete?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
