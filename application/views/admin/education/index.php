<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Education</h1><div class="breadcrumb"><?= count($items) ?> item(s)</div></div>
  <a href="<?= site_url('admin/education/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Education</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Logo</th><th>Institution</th><th>Major</th><th>Year</th><th>GPA</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="6" class="empty"><i class="bi bi-mortarboard"></i> No education yet</td></tr>
      <?php else: foreach ($items as $ed): ?>
      <tr>
        <td><img class="thumb" src="<?= $ed['logo'] ? upload_url('education/'.$ed['logo']) : base_url('assets/images/placeholder.svg') ?>"></td>
        <td><?= e($ed['institution']) ?></td>
        <td><?= e($ed['major']) ?></td>
        <td><?= e($ed['start_year']) ?>—<?= e($ed['end_year']) ?></td>
        <td><?= e($ed['gpa'] ?: '—') ?></td>
        <td class="actions">
          <a href="<?= site_url('admin/education/form/'.$ed['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/education/delete/'.$ed['id'], array('data-confirm'=>'Delete?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
