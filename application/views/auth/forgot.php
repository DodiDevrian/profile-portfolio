<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body>
<div class="auth-page">
  <div class="auth-card">
    <h1>Reset password</h1>
    <p class="sub">Enter your email and we'll send a reset link</p>
    <?php if ($s = $this->session->flashdata('success')): ?><div class="alert alert-success"><?= e($s) ?></div><?php endif; ?>
    <?= form_open('forgot-password') ?>
      <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" placeholder="you@example.com" required>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center"><i class="bi bi-send"></i> Send reset link</button>
    <?= form_close() ?>
    <p style="text-align:center;margin-top:1.4rem"><a href="<?= site_url('login') ?>">← Back to sign in</a></p>
  </div>
</div>
</body>
</html>
