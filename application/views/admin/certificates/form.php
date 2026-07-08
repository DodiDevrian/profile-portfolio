<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/certificates') ?>">Certificates</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open_multipart('admin/certificates/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <div class="form-group"><label>Certificate Image</label><br>
    <img class="img-preview" src="<?= !empty($item['image']) ? upload_url('certificates/'.$item['image']) : base_url('assets/images/placeholder.svg') ?>">
    <input class="form-control" type="file" name="image" accept="image/*">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Title *</label><input class="form-control" name="title" value="<?= e($item['title'] ?? '') ?>" required></div>
    <div class="form-group"><label>Issuer</label><input class="form-control" name="issuer" value="<?= e($item['issuer'] ?? '') ?>"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Issue Date</label><input class="form-control" type="date" name="issue_date" value="<?= e($item['issue_date'] ?? '') ?>"></div>
    <div class="form-group"><label>Credential URL</label><input class="form-control" name="credential_url" value="<?= e($item['credential_url'] ?? '') ?>" placeholder="https://"></div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
  </div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
  <a href="<?= site_url('admin/certificates') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
