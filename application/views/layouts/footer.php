<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<footer class="footer">
  <div class="container">
    <a href="<?= base_url() ?>" class="brand"><?= e($profile['name'] ?? 'Portfolio') ?><span>.</span></a>
    <ul class="footer-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#skills">Skills</a></li>
      <li><a href="#portfolio">Portfolio</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <?php if ( ! empty($socials)): ?>
    <div class="footer-social">
      <?php foreach ($socials as $s): ?>
        <a href="<?= e($s['url']) ?>" target="_blank" rel="noopener" title="<?= e($s['platform']) ?>"><i class="bi <?= e($s['icon'] ?: 'bi-link-45deg') ?>"></i></a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <p class="copy">&copy; <?= date('Y') ?> <?= e($profile['name'] ?? '') ?>. All rights reserved.</p>
  </div>
</footer>

<button class="back-top" aria-label="Back to top"><i class="bi bi-arrow-up"></i></button>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>AOS && AOS.init({duration:700,once:true,offset:80});</script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>
