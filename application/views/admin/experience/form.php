<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/experience') ?>">Experience</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open_multipart('admin/experience/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <div class="form-group"><label>Company Logo</label><br>
    <img class="img-preview" src="<?= !empty($item['logo']) ? upload_url('experience/'.$item['logo']) : base_url('assets/images/placeholder.svg') ?>">
    <input class="form-control" type="file" name="logo" accept="image/*">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Company *</label><input class="form-control" name="company" value="<?= e($item['company'] ?? '') ?>" required></div>
    <div class="form-group"><label>Position *</label><input class="form-control" name="position" value="<?= e($item['position'] ?? '') ?>" required></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Start</label><input class="form-control" name="start_date" value="<?= e($item['start_date'] ?? '') ?>" placeholder="2022"></div>
    <div class="form-group"><label>End</label><input class="form-control" name="end_date" value="<?= e($item['end_date'] ?? '') ?>" placeholder="Present"></div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
  </div>
  <div class="form-group"><label>Description</label><textarea class="form-control" name="description"><?= e($item['description'] ?? '') ?></textarea></div>
  <div class="form-group"><label>Technology <span class="help">(comma separated)</span></label><input class="form-control" name="technology" value="<?= e($item['technology'] ?? '') ?>" placeholder="Laravel, Vue, MySQL"></div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
  <a href="<?= site_url('admin/experience') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
