<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1><?= e($page_title) ?></h1><div class="breadcrumb"><a href="<?= site_url('admin/portfolio') ?>">Portfolio</a> / <?= $item ? 'Edit' : 'New' ?></div></div></div>
<?= form_open_multipart('admin/portfolio/save') ?>
<input type="hidden" name="id" value="<?= e($item['id'] ?? '') ?>">
<div class="card">
  <h3>Project Details</h3>
  <div class="form-group"><label>Thumbnail</label><br>
    <img class="img-preview" style="width:160px" src="<?= !empty($item['thumbnail']) ? upload_url('portfolio/'.$item['thumbnail']) : base_url('assets/images/placeholder.svg') ?>">
    <input class="form-control" type="file" name="thumbnail" accept="image/*">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Title *</label><input class="form-control" name="title" value="<?= e($item['title'] ?? '') ?>" required></div>
    <div class="form-group"><label>Slug <span class="help">(auto if blank)</span></label><input class="form-control" name="slug" value="<?= e($item['slug'] ?? '') ?>"></div>
    <div class="form-group"><label>Category</label><input class="form-control" name="category" value="<?= e($item['category'] ?? '') ?>" placeholder="Web App"></div>
  </div>
  <div class="form-group"><label>Description</label><textarea class="form-control" name="description" rows="5"><?= e($item['description'] ?? '') ?></textarea></div>
  <div class="form-group"><label>Technology <span class="help">(comma separated)</span></label><input class="form-control" name="technology" value="<?= e($item['technology'] ?? '') ?>"></div>
  <div class="form-row">
    <div class="form-group"><label>GitHub URL</label><input class="form-control" name="github_url" value="<?= e($item['github_url'] ?? '') ?>"></div>
    <div class="form-group"><label>Demo URL</label><input class="form-control" name="demo_url" value="<?= e($item['demo_url'] ?? '') ?>"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Status</label>
      <select class="form-control" name="status">
        <?php foreach (array('Published','Draft') as $o): ?><option <?= ($item['status'] ?? 'Published')===$o?'selected':'' ?>><?= $o ?></option><?php endforeach; ?>
      </select>
    </div>
    <div class="form-group"><label>Sort Order</label><input class="form-control" type="number" name="sort_order" value="<?= e($item['sort_order'] ?? 0) ?>"></div>
    <div class="form-group"><label>&nbsp;</label><label style="color:var(--text);display:flex;align-items:center;gap:.5rem"><input type="checkbox" name="featured" value="1" <?= !empty($item['featured'])?'checked':'' ?>> Featured project</label></div>
  </div>
</div>

<div class="card">
  <h3>SEO</h3>
  <div class="form-group"><label>Meta Title</label><input class="form-control" name="meta_title" value="<?= e($item['meta_title'] ?? '') ?>"></div>
  <div class="form-group"><label>Meta Description</label><textarea class="form-control" name="meta_description"><?= e($item['meta_description'] ?? '') ?></textarea></div>
</div>

<div class="card">
  <h3>Gallery</h3>
  <?php if ( ! empty($gallery)): ?>
  <div style="display:flex;flex-wrap:wrap;gap:.8rem;margin-bottom:1rem">
    <?php foreach ($gallery as $g): ?>
    <div style="position:relative">
      <img class="img-preview" style="width:110px;height:80px;margin:0" src="<?= upload_url('portfolio/'.$g['image']) ?>">
      <a href="<?= site_url('admin/portfolio/delete_image/'.$g['id'].'/'.$item['id']) ?>" onclick="return confirm('Remove image?')" class="btn btn-danger btn-sm" style="position:absolute;top:4px;right:4px;padding:.15rem .35rem"><i class="bi bi-x"></i></a>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <div class="form-group"><label>Add Gallery Images <span class="help">(multiple)</span></label><input class="form-control" type="file" name="gallery[]" accept="image/*" multiple></div>
</div>

<div class="card">
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Project</button>
  <a href="<?= site_url('admin/portfolio') ?>" class="btn btn-ghost">Cancel</a>
</div>
<?= form_close() ?>
