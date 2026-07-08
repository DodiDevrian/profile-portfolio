<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Skills</h1><div class="breadcrumb"><?= count($items) ?> skill(s)</div></div>
  <a href="<?= site_url('admin/skills/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Skill</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Order</th><th>Name</th><th>Category</th><th>Level</th><th>Color</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="6" class="empty"><i class="bi bi-bar-chart"></i> No skills yet</td></tr>
      <?php else: foreach ($items as $s): ?>
      <tr>
        <td><?= (int)$s['sort_order'] ?></td>
        <td><i class="bi <?= e($s['icon']) ?>"></i> <?= e($s['name']) ?></td>
        <td><span class="badge badge-blue"><?= e($s['category']) ?></span></td>
        <td><div class="progress-track" style="width:120px;height:7px;background:var(--surface);border-radius:99px;overflow:hidden"><div style="width:<?= (int)$s['percentage'] ?>%;height:100%;background:<?= e($s['color']) ?>"></div></div><small><?= (int)$s['percentage'] ?>%</small></td>
        <td><span style="display:inline-block;width:20px;height:20px;border-radius:6px;background:<?= e($s['color']) ?>"></span></td>
        <td class="actions">
          <a href="<?= site_url('admin/skills/form/'.$s['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/skills/delete/'.$s['id'], array('data-confirm'=>'Delete this skill?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
