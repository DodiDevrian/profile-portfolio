<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/education') ?>">Education</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open_multipart('admin/education/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <div class="form-group"><label>Institution Logo</label><br>
    <img class="img-preview" src="<?= !empty($item['logo']) ? upload_url('education/'.$item['logo']) : base_url('assets/images/placeholder.svg') ?>">
    <input class="form-control" type="file" name="logo" accept="image/*">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Institution *</label><input class="form-control" name="institution" value="<?= e($item['institution'] ?? '') ?>" required></div>
    <div class="form-group"><label>Major</label><input class="form-control" name="major" value="<?= e($item['major'] ?? '') ?>"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Start Year</label><input class="form-control" name="start_year" value="<?= e($item['start_year'] ?? '') ?>"></div>
    <div class="form-group"><label>End Year</label><input class="form-control" name="end_year" value="<?= e($item['end_year'] ?? '') ?>"></div>
    <div class="form-group"><label>GPA (optional)</label><input class="form-control" name="gpa" value="<?= e($item['gpa'] ?? '') ?>"></div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
  </div>
  <div class="form-group"><label>Description</label><textarea class="form-control" name="description"><?= e($item['description'] ?? '') ?></textarea></div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
  <a href="<?= site_url('admin/education') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
