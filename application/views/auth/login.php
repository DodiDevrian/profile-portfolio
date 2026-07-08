<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In — Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
</head>
<body>
<div class="auth-page">
  <div class="auth-card">
    <h1>Welcome back</h1>
    <p class="sub">Sign in to your dashboard</p>

    <?php if ($e = $this->session->flashdata('error')): ?><div class="alert alert-error"><?= e($e) ?></div><?php endif; ?>
    <?php if ($s = $this->session->flashdata('success')): ?><div class="alert alert-success"><?= e($s) ?></div><?php endif; ?>

    <?= form_open('login') ?>
      <div class="form-group">
        <label>Email</label>
        <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>" placeholder="admin@portfolio.test" required autofocus>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input class="form-control" type="password" name="password" placeholder="••••••••" required>
      </div>
      <div class="checkbox-row">
        <label><input type="checkbox" name="remember" value="1"> Remember me</label>
        <a href="<?= site_url('forgot-password') ?>">Forgot password?</a>
      </div>
      <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center"><i class="bi bi-box-arrow-in-right"></i> Sign In</button>
    <?= form_close() ?>
    <p style="text-align:center;margin-top:1.4rem;font-size:.82rem;color:var(--text-muted)">
      Demo: admin@portfolio.test / admin123
    </p>
  </div>
</div>
</body>
</html>
