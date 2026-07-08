<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Certificates</h1><div class="breadcrumb"><?= count($items) ?> certificate(s)</div></div>
  <a href="<?= site_url('admin/certificates/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Certificate</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Image</th><th>Title</th><th>Issuer</th><th>Date</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="5" class="empty"><i class="bi bi-patch-check"></i> No certificates yet</td></tr>
      <?php else: foreach ($items as $c): ?>
      <tr>
        <td><img class="thumb" src="<?= $c['image'] ? upload_url('certificates/'.$c['image']) : base_url('assets/images/placeholder.svg') ?>"></td>
        <td><?= e($c['title']) ?></td>
        <td><?= e($c['issuer']) ?></td>
        <td><?= format_date($c['issue_date'], 'M Y') ?></td>
        <td class="actions">
          <?php if ($c['credential_url']): ?><a href="<?= e($c['credential_url']) ?>" target="_blank" class="btn btn-ghost btn-sm"><i class="bi bi-link-45deg"></i></a><?php endif; ?>
          <a href="<?= site_url('admin/certificates/form/'.$c['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/certificates/delete/'.$c['id'], array('data-confirm'=>'Delete?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
