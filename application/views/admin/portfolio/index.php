<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Portfolio</h1><div class="breadcrumb"><?= count($items) ?> project(s)</div></div>
  <a href="<?= site_url('admin/portfolio/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Project</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Thumb</th><th>Title</th><th>Category</th><th>Status</th><th>Featured</th><th>Views</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="7" class="empty"><i class="bi bi-collection"></i> No projects yet</td></tr>
      <?php else: foreach ($items as $p): ?>
      <tr>
        <td><img class="thumb" src="<?= $p['thumbnail'] ? upload_url('portfolio/'.$p['thumbnail']) : base_url('assets/images/placeholder.svg') ?>"></td>
        <td><?= e($p['title']) ?><br><small style="color:var(--text-muted)"><?= e($p['slug']) ?></small></td>
        <td><span class="badge badge-blue"><?= e($p['category']) ?></span></td>
        <td><span class="badge <?= $p['status']==='Published'?'badge-green':'badge-gray' ?>"><?= e($p['status']) ?></span></td>
        <td><?= $p['featured'] ? '<i class="bi bi-star-fill" style="color:var(--warning)"></i>' : '—' ?></td>
        <td><?= (int)$p['views'] ?></td>
        <td class="actions">
          <a href="<?= site_url('portfolio/'.$p['slug']) ?>" target="_blank" class="btn btn-ghost btn-sm"><i class="bi bi-eye"></i></a>
          <a href="<?= site_url('admin/portfolio/form/'.$p['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/portfolio/delete/'.$p['id'], array('data-confirm'=>'Delete this project?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
