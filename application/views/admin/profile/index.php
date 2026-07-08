<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1>Profile</h1><div class="breadcrumb">Your personal identity &amp; social links</div></div></div>

<?= form_open_multipart('admin/profile') ?>
<div class="card">
  <h3>Basic Information</h3>
  <div class="form-group">
    <label>Photo</label><br>
    <img class="img-preview" src="<?= !empty($profile['photo']) ? upload_url('profile/'.$profile['photo']) : base_url('assets/images/avatar.svg') ?>">
    <input class="form-control" type="file" name="photo" accept="image/*">
  </div>
  <div class="form-row">
    <div class="form-group"><label>Name *</label><input class="form-control" name="name" value="<?= e($profile['name'] ?? '') ?>" required></div>
    <div class="form-group"><label>Job Title</label><input class="form-control" name="title" value="<?= e($profile['title'] ?? '') ?>"></div>
  </div>
  <div class="form-group"><label>Bio</label><textarea class="form-control" name="bio"><?= e($profile['bio'] ?? '') ?></textarea></div>
  <div class="form-row">
    <div class="form-group"><label>Email</label><input class="form-control" type="email" name="email" value="<?= e($profile['email'] ?? '') ?>"></div>
    <div class="form-group"><label>Phone</label><input class="form-control" name="phone" value="<?= e($profile['phone'] ?? '') ?>"></div>
  </div>
  <div class="form-row">
    <div class="form-group"><label>Address</label><input class="form-control" name="address" value="<?= e($profile['address'] ?? '') ?>"></div>
    <div class="form-group"><label>Birthday</label><input class="form-control" type="date" name="birthday" value="<?= e($profile['birthday'] ?? '') ?>"></div>
    <div class="form-group"><label>Freelance Status</label>
      <select class="form-control" name="freelance">
        <?php foreach (array('Available','Not Available') as $o): ?><option <?= ($profile['freelance'] ?? '')===$o?'selected':'' ?>><?= $o ?></option><?php endforeach; ?>
      </select>
    </div>
  </div>
</div>

<div class="card">
  <h3>Social Links</h3>
  <div class="form-row">
    <?php foreach (array('linkedin','github','instagram','facebook','twitter','youtube','website') as $f): ?>
    <div class="form-group"><label><?= ucfirst($f) ?></label><input class="form-control" name="<?= $f ?>" value="<?= e($profile[$f] ?? '') ?>" placeholder="https://"></div>
    <?php endforeach; ?>
  </div>
  <button class="btn btn-primary"><i class="bi bi-check-lg"></i> Save Profile</button>
</div>
<?= form_close() ?>
