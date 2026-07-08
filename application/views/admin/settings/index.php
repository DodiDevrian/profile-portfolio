<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1>Settings</h1><div class="breadcrumb">Site-wide configuration &amp; SEO</div></div></div>

<?= form_open_multipart('admin/settings') ?>
<div class="card">
  <h3>General</h3>
  <div class="form-group"><label>Website Title</label><input class="form-control" name="site_title" value="<?= e($s['site_title'] ?? '') ?>"></div>
  <div class="form-row">
    <div class="form-group"><label>Logo</label>
      <?php if (!empty($s['logo'])): ?><br><img class="img-preview" src="<?= upload_url($s['logo']) ?>"><?php endif; ?>
      <input class="form-control" type="file" name="logo" accept="image/*">
    </div>
    <div class="form-group"><label>Favicon</label>
      <?php if (!empty($s['favicon'])): ?><br><img class="img-preview" style="width:48px;height:48px" src="<?= upload_url($s['favicon']) ?>"><?php endif; ?>
      <input class="form-control" type="file" name="favicon" accept="image/*">
    </div>
  </div>
</div>

<div class="card">
  <h3>SEO</h3>
  <div class="form-group"><label>Meta Title</label><input class="form-control" name="meta_title" value="<?= e($s['meta_title'] ?? '') ?>"></div>
  <div class="form-group"><label>Meta Description</label><textarea class="form-control" name="meta_description"><?= e($s['meta_description'] ?? '') ?></textarea></div>
  <div class="form-group"><label>Meta Keywords</label><input class="form-control" name="meta_keywords" value="<?= e($s['meta_keywords'] ?? '') ?>"></div>
</div>

<div class="card">
  <h3>Integrations</h3>
  <div class="form-row">
    <div class="form-group"><label>Google Analytics ID</label><input class="form-control" name="google_analytics" value="<?= e($s['google_analytics'] ?? '') ?>" placeholder="G-XXXXXXX"></div>
    <div class="form-group"><label>Facebook Pixel ID</label><input class="form-control" name="facebook_pixel" value="<?= e($s['facebook_pixel'] ?? '') ?>"></div>
    <div class="form-group"><label>WhatsApp Number</label><input class="form-control" name="whatsapp" value="<?= e($s['whatsapp'] ?? '') ?>" placeholder="628123456789"></div>
  </div>
  <div class="form-group"><label>Google Maps Embed <span class="help">(&lt;iframe&gt; embed code)</span></label><textarea class="form-control" name="map_embed"><?= e($s['map_embed'] ?? '') ?></textarea></div>
</div>

<div class="card">
  <h3>Modes</h3>
  <label style="color:var(--text);display:flex;align-items:center;gap:.5rem;margin-bottom:.8rem"><input type="checkbox" name="dark_mode" value="1" <?= !empty($s['dark_mode'])?'checked':'' ?>> Dark mode (default theme)</label>
  <label style="color:var(--text);display:flex;align-items:center;gap:.5rem"><input type="checkbox" name="maintenance_mode" value="1" <?= !empty($s['maintenance_mode'])?'checked':'' ?>> Maintenance mode</label>
  <div style="margin-top:1.2rem">
    <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Settings</button>
  </div>
</div>
<?= form_close() ?>
