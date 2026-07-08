<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($site_title ?? setting('site_title', 'Portfolio')) ?></title>
  <meta name="description" content="<?= e(setting('meta_description')) ?>">
  <meta name="keywords" content="<?= e(setting('meta_keywords')) ?>">
  <meta name="author" content="<?= e($profile['name'] ?? '') ?>">
  <!-- Open Graph -->
  <meta property="og:title" content="<?= e($site_title ?? setting('meta_title')) ?>">
  <meta property="og:description" content="<?= e(setting('meta_description')) ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= current_url() ?>">
  <?php if ($og = ($profile['photo'] ?? '')): ?>
  <meta property="og:image" content="<?= upload_url('profile/'.$og) ?>">
  <?php endif; ?>
  <link rel="icon" href="<?= setting('favicon') ? upload_url($_ = setting('favicon')) : base_url('assets/images/favicon.svg') ?>">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <?php if ($ga = setting('google_analytics')): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($ga) ?>"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?= e($ga) ?>');</script>
  <?php endif; ?>
</head>
<body>

<nav class="navbar">
  <div class="container inner">
    <a href="<?= base_url() ?>" class="brand"><?= e($profile['name'] ?? 'Portfolio') ?><span>.</span></a>
    <button class="nav-toggle" aria-label="Menu"><i class="bi bi-list"></i></button>
    <ul class="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#experience">Experience</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </div>
</nav>
