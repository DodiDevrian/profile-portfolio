<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layouts/header');
?>
<section class="detail-hero">
  <div class="container">
    <a href="<?= base_url() ?>#portfolio" class="btn btn-ghost btn-sm" style="margin-bottom:1.5rem"><i class="bi bi-arrow-left"></i> Back</a>
    <p class="section-eyebrow"><?= e($project['category']) ?></p>
    <h1 class="section-title"><?= e($project['title']) ?></h1>
    <div class="tags" style="margin:1rem 0">
      <?php foreach (explode(',', (string)$project['technology']) as $t): if(trim($t)==='')continue; ?><span class="tag"><?= e(trim($t)) ?></span><?php endforeach; ?>
    </div>
    <div class="cta" style="display:flex;gap:1rem;margin:1.5rem 0">
      <?php if ($project['demo_url']): ?><a href="<?= e($project['demo_url']) ?>" target="_blank" rel="noopener" class="btn btn-primary"><i class="bi bi-box-arrow-up-right"></i> Live Demo</a><?php endif; ?>
      <?php if ($project['github_url']): ?><a href="<?= e($project['github_url']) ?>" target="_blank" rel="noopener" class="btn btn-ghost"><i class="bi bi-github"></i> Source</a><?php endif; ?>
    </div>

    <img class="about-photo" style="width:100%;margin:1rem 0" src="<?= $project['thumbnail'] ? upload_url('portfolio/'.$project['thumbnail']) : base_url('assets/images/placeholder.svg') ?>" alt="<?= e($project['title']) ?>">

    <div class="glass" style="padding:2rem;margin-top:1.5rem">
      <h3>About this project</h3>
      <p class="text-muted-2"><?= nl2br(e($project['description'])) ?></p>
    </div>

    <?php if ( ! empty($gallery)): ?>
    <h3 style="margin-top:2.5rem">Gallery</h3>
    <div class="detail-gallery">
      <?php foreach ($gallery as $g): ?>
        <img src="<?= upload_url('portfolio/'.$g['image']) ?>" alt="Gallery" loading="lazy">
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if ( ! empty($related)): ?>
    <h3 style="margin-top:2.5rem">More projects</h3>
    <div class="portfolio-grid" style="margin-top:1rem">
      <?php foreach ($related as $p): if($p['id']==$project['id'])continue; ?>
      <a href="<?= site_url('portfolio/'.$p['slug']) ?>" class="pf-card glass" style="display:block">
        <div class="pf-thumb"><img src="<?= $p['thumbnail'] ? upload_url('portfolio/'.$p['thumbnail']) : base_url('assets/images/placeholder.svg') ?>" alt="<?= e($p['title']) ?>"></div>
        <div class="pf-body"><h4><?= e($p['title']) ?></h4></div>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php $this->load->view('layouts/footer'); ?>
