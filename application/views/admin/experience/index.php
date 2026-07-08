<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Experience</h1><div class="breadcrumb"><?= count($items) ?> item(s)</div></div>
  <a href="<?= site_url('admin/experience/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Experience</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Logo</th><th>Company</th><th>Position</th><th>Period</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="5" class="empty"><i class="bi bi-briefcase"></i> No experience yet</td></tr>
      <?php else: foreach ($items as $x): ?>
      <tr>
        <td><img class="thumb" src="<?= $x['logo'] ? upload_url('experience/'.$x['logo']) : base_url('assets/images/placeholder.svg') ?>"></td>
        <td><?= e($x['company']) ?></td>
        <td><?= e($x['position']) ?></td>
        <td><?= e($x['start_date']) ?> — <?= e($x['end_date'] ?: 'Present') ?></td>
        <td class="actions">
          <a href="<?= site_url('admin/experience/form/'.$x['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/experience/delete/'.$x['id'], array('data-confirm'=>'Delete?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
