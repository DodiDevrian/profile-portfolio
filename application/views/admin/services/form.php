<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/services') ?>">Services</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open('admin/services/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <div class="form-row">
    <div class="form-group"><label>Icon <span class="help">(Bootstrap Icon class)</span></label><input class="form-control" name="icon" value="<?= e($item['icon'] ?? '') ?>" placeholder="bi-code-slash"></div>
    <div class="form-group"><label>Title *</label><input class="form-control" name="title" value="<?= e($item['title'] ?? '') ?>" required></div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
  </div>
  <div class="form-group"><label>Description</label><textarea class="form-control" name="description"><?= e($item['description'] ?? '') ?></textarea></div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
  <a href="<?= site_url('admin/services') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
