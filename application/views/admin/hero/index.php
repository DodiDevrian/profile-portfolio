<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1>Hero Section</h1><div class="breadcrumb">The first thing visitors see</div></div></div>

<?= form_open_multipart('admin/hero') ?>
<div class="card">
  <div class="form-group">
    <label>Hero Photo <span class="help">(falls back to profile photo)</span></label><br>
    <img class="img-preview" src="<?= !empty($hero['photo']) ? upload_url('profile/'.$hero['photo']) : base_url('assets/images/avatar.svg') ?>">
    <input class="form-control" type="file" name="photo" accept="image/*">
  </div>
  <div class="form-group"><label>Title *</label><input class="form-control" name="title" value="<?= e($hero['title'] ?? '') ?>" required></div>
  <div class="form-group"><label>Subtitle</label><input class="form-control" name="subtitle" value="<?= e($hero['subtitle'] ?? '') ?>"></div>
  <div class="form-group"><label>Typed Text <span class="help">(comma separated, animates)</span></label><input class="form-control" name="typed_text" value="<?= e($hero['typed_text'] ?? '') ?>" placeholder="Developer, Designer, Freelancer"></div>
  <div class="form-group"><label>Description</label><textarea class="form-control" name="description"><?= e($hero['description'] ?? '') ?></textarea></div>
  <div class="form-row">
    <div class="form-group"><label>Primary Button Label</label><input class="form-control" name="cta_primary_label" value="<?= e($hero['cta_primary_label'] ?? 'Download CV') ?>"></div>
    <div class="form-group"><label>Secondary Button Label</label><input class="form-control" name="cta_secondary_label" value="<?= e($hero['cta_secondary_label'] ?? 'Contact Me') ?>"></div>
    <div class="form-group"><label>Animation</label>
      <select class="form-control" name="animation">
        <?php foreach (array('fade','slide','zoom','none') as $o): ?><option <?= ($hero['animation'] ?? '')===$o?'selected':'' ?>><?= $o ?></option><?php endforeach; ?>
      </select>
    </div>
  </div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Hero</button>
</div>
<?= form_close() ?>
