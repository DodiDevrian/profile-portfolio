<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$unread = isset($unread_count) ? $unread_count : 0;
$nav = array(
  'Main' => array(
    'dashboard' => array('Dashboard', 'bi-grid-1x2'),
  ),
  'Content' => array(
    'profile'      => array('Profile', 'bi-person-badge'),
    'hero'         => array('Hero', 'bi-stars'),
    'about'        => array('About', 'bi-info-circle'),
    'skills'       => array('Skills', 'bi-bar-chart'),
    'experience'   => array('Experience', 'bi-briefcase'),
    'education'    => array('Education', 'bi-mortarboard'),
    'portfolio'    => array('Portfolio', 'bi-collection'),
    'services'     => array('Services', 'bi-gear-wide-connected'),
    'certificates' => array('Certificates', 'bi-patch-check'),
    'testimonials' => array('Testimonials', 'bi-chat-quote'),
  ),
  'Manage' => array(
    'messages' => array('Messages', 'bi-envelope'),
    'resume'   => array('Resume', 'bi-file-earmark-pdf'),
    'settings' => array('Settings', 'bi-sliders'),
  ),
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($page_title ?? 'Admin') ?> — Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css') ?>">
  <link rel="icon" href="<?= base_url('assets/images/favicon.svg') ?>">
</head>
<body>
<div class="admin-wrap">
  <aside class="sidebar" id="sidebar">
    <div class="logo">Portfolio<span>CMS</span></div>
    <nav>
      <?php foreach ($nav as $group => $items): ?>
        <div class="nav-group"><?= e($group) ?></div>
        <?php foreach ($items as $slug => $meta): ?>
          <a href="<?= site_url('admin/'.$slug) ?>" class="<?= active_class($slug, $active) ?>">
            <i class="bi <?= $meta[1] ?>"></i> <?= e($meta[0]) ?>
            <?php if ($slug === 'messages' && $unread > 0): ?><span class="badge"><?= $unread ?></span><?php endif; ?>
          </a>
        <?php endforeach; ?>
      <?php endforeach; ?>
      <div class="nav-group">Account</div>
      <a href="<?= base_url() ?>" target="_blank"><i class="bi bi-box-arrow-up-right"></i> View Site</a>
      <a href="<?= site_url('logout') ?>"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>
  </aside>

  <div class="main">
    <header class="topbar">
      <button class="menu-btn" id="menuBtn"><i class="bi bi-list"></i></button>
      <div style="flex:1"></div>
      <div class="user">
        <?php if ( ! empty($auth_user['avatar'])): ?>
          <img src="<?= upload_url('profile/'.$auth_user['avatar']) ?>" alt="">
        <?php else: ?>
          <div class="av"><?= strtoupper(substr($auth_user['name'] ?? 'A', 0, 1)) ?></div>
        <?php endif; ?>
        <div style="font-size:.85rem"><b><?= e($auth_user['name'] ?? 'Admin') ?></b></div>
      </div>
    </header>

    <div class="content">
      <?php if ($s = $this->session->flashdata('success')): ?><div class="alert alert-success"><i class="bi bi-check-circle"></i> <?= e($s) ?></div><?php endif; ?>
      <?php if ($er = $this->session->flashdata('error')): ?><div class="alert alert-error"><i class="bi bi-exclamation-triangle"></i> <?= e($er) ?></div><?php endif; ?>
      <?php if (validation_errors()): ?><div class="alert alert-error"><?= validation_errors() ?></div><?php endif; ?>

      <?php $this->load->view('admin/'.$content_view); ?>
    </div>
  </div>
</div>
<script>
  document.getElementById('menuBtn').addEventListener('click', function(){
    document.getElementById('sidebar').classList.toggle('open');
  });
  // Confirm on delete forms
  document.querySelectorAll('form[data-confirm]').forEach(function(f){
    f.addEventListener('submit', function(e){ if(!confirm(f.getAttribute('data-confirm'))) e.preventDefault(); });
  });
</script>
</body>
</html>
