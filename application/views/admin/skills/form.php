<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/skills') ?>">Skills</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open('admin/skills/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <div class="form-row">
    <div class="form-group"><label>Name *</label><input class="form-control" name="name" value="<?= e($item['name'] ?? '') ?>" required></div>
    <div class="form-group"><label>Category *</label>
      <select class="form-control" name="category">
        <?php foreach (array('Frontend','Backend','Database','Mobile','Tools','Cloud') as $c): ?>
          <option <?= ($item['category'] ?? '')===$c?'selected':'' ?>><?= $c ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Icon <span class="help">(Bootstrap Icon class, e.g. bi-git)</span></label><input class="form-control" name="icon" value="<?= e($item['icon'] ?? '') ?>" placeholder="bi-code-slash"></div>
    <div class="form-group"><label>Percentage (0-100)</label><input class="form-control" type="number" min="0" max="100" name="percentage" value="<?= e($item['percentage'] ?? 80) ?>"></div>
    <div class="form-group"><label>Color</label><input class="form-control" type="color" name="color" value="<?= e($item['color'] ?? '#38BDF8') ?>"></div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
  </div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save</button>
  <a href="<?= site_url('admin/skills') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
