<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1>About</h1><div class="breadcrumb">Your story &amp; quick facts</div></div></div>

<?= form_open_multipart('admin/about') ?>
<div class="card">
  <div class="form-group">
    <label>Photo</label><br>
    <img class="img-preview" src="<?= !empty($about['photo']) ? upload_url('profile/'.$about['photo']) : base_url('assets/images/avatar.svg') ?>">
    <input class="form-control" type="file" name="photo" accept="image/*">
  </div>
  <div class="form-group"><label>Description</label><textarea class="form-control" name="description" rows="5"><?= e($about['description'] ?? '') ?></textarea></div>
  <div class="form-row">
    <div class="form-group"><label>Age</label><input class="form-control" type="number" name="age" value="<?= e($about['age'] ?? '') ?>"></div>
    <div class="form-group"><label>Domicile</label><input class="form-control" name="domicile" value="<?= e($about['domicile'] ?? '') ?>"></div>
    <div class="form-group"><label>Freelance</label><input class="form-control" name="freelance" value="<?= e($about['freelance'] ?? '') ?>"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Email</label><input class="form-control" name="email" value="<?= e($about['email'] ?? '') ?>"></div>
    <div class="form-group"><label>Phone</label><input class="form-control" name="phone" value="<?= e($about['phone'] ?? '') ?>"></div>
  </div>
  <h3 style="margin-top:1rem">Counters</h3>
  <div class="form-row">
    <div class="form-group"><label>Years of Experience</label><input class="form-control" type="number" name="experience_years" value="<?= e($about['experience_years'] ?? 0) ?>"></div>
    <div class="form-group"><label>Projects Done</label><input class="form-control" type="number" name="projects_done" value="<?= e($about['projects_done'] ?? 0) ?>"></div>
    <div class="form-group"><label>Happy Clients</label><input class="form-control" type="number" name="happy_clients" value="<?= e($about['happy_clients'] ?? 0) ?>"></div>
  </div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save About</button>
</div>
<?= form_close() ?>
