<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Testimonials</h1><div class="breadcrumb"><?= count($items) ?> testimonial(s)</div></div>
  <a href="<?= site_url('admin/testimonials/form') ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Add Testimonial</a>
</div>
<div class="card table-wrap">
  <table>
    <thead><tr><th>Photo</th><th>Name</th><th>Position</th><th>Rating</th><th>Message</th><th></th></tr></thead>
    <tbody>
      <?php if (empty($items)): ?><tr><td colspan="6" class="empty"><i class="bi bi-chat-quote"></i> No testimonials yet</td></tr>
      <?php else: foreach ($items as $t): ?>
      <tr>
        <td><img class="thumb" style="border-radius:50%" src="<?= $t['photo'] ? upload_url('testimonials/'.$t['photo']) : base_url('assets/images/avatar.svg') ?>"></td>
        <td><?= e($t['name']) ?></td>
        <td><?= e($t['position']) ?></td>
        <td style="color:var(--warning)"><?= rating_stars($t['rating']) ?></td>
        <td><?= e(excerpt($t['message'], 60)) ?></td>
        <td class="actions">
          <a href="<?= site_url('admin/testimonials/form/'.$t['id']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-pencil"></i></a>
          <?= form_open('admin/testimonials/delete/'.$t['id'], array('data-confirm'=>'Delete?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
        </td>
      </tr>
      <?php endforeach; endif; ?>
    </tbody>
  </table>
</div>
