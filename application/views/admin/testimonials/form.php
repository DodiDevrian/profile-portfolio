<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/testimonials') ?>">Testimonials</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open_multipart('admin/testimonials/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <div class="form-group"><label>Photo</label><br>
    <img class="img-preview" style="border-radius:50%" src="<?= !empty($item['photo']) ? upload_url('testimonials/'.$item['photo']) : base_url('assets/images/avatar.svg') ?>">
    <input class="form-control" type="file" name="photo" accept="image/*">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Name *</label><input class="form-control" name="name" value="<?= e($item['name'] ?? '') ?>" required></div>
    <div class="form-group"><label>Position</label><input class="form-control" name="position" value="<?= e($item['position'] ?? '') ?>"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Rating (1-5)</label>
      <select class="form-control" name="rating">
        <?php for ($i=5;$i>=1;$i--): ?><option value="<?= $i ?>" <?= ($item['rating'] ?? 5)==$i?'selected':'' ?>><?= $i ?> star<?= $i>1?'s':'' ?></option><?php endfor; ?>
      </select>
    </div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
  </div>
  <div class="form-group"><label>Message</label><textarea class="form-control" name="message"><?= e($item['message'] ?? '') ?></textarea></div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
  <a href="<?= site_url('admin/testimonials') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
