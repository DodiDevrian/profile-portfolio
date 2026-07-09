<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layouts/header');

$skill_icons = array(
  'Frontend' => 'bi-window', 'Backend' => 'bi-hdd-stack', 'Database' => 'bi-database',
  'Mobile' => 'bi-phone', 'Tools' => 'bi-tools', 'Cloud' => 'bi-cloud',
);
?>

<!-- ===================== HERO ===================== -->
<section class="hero" id="home">
  <div class="floating-shape shape-1"></div>
  <div class="floating-shape shape-2"></div>
  <div class="container">
    <div class="grid">
      <div data-aos="fade-right">
        <p class="section-eyebrow"><?= e($hero['subtitle'] ?? 'Welcome') ?></p>
        <h1>Halo<?= e($hero['title'] ?? ($profile['name'] ?? 'Hello')) ?></h1>
        <?php if ( ! empty($hero['typed_text'])): ?>
          <h2 style="font-size:1.4rem;margin:.2rem 0"><span class="typed" data-typed="<?= e($hero['typed_text']) ?>"></span></h2>
        <?php endif; ?>
        <p class="lead"><?= e($hero['description'] ?? ($profile['bio'] ?? '')) ?></p>
        <div class="cta">
          <?php if ( ! empty($profile['resume'])): ?>
            <a href="<?= upload_url('resume/'.$profile['resume']) ?>" class="btn btn-primary" download><i class="bi bi-download"></i> <?= e($hero['cta_primary_label'] ?? 'Download CV') ?></a>
          <?php endif; ?>
          <a href="#contact" class="btn btn-ghost"><i class="bi bi-envelope"></i> <?= e($hero['cta_secondary_label'] ?? 'Contact Me') ?></a>
        </div>
        <?php if ( ! empty($socials)): ?>
        <div class="hero-social">
          <?php foreach ($socials as $s): ?>
            <a href="<?= e($s['url']) ?>" target="_blank" rel="noopener" title="<?= e($s['platform']) ?>"><i class="bi <?= e($s['icon'] ?: 'bi-link-45deg') ?>"></i></a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div data-aos="fade-left">
        <img class="hero-photo" src="<?= ($p = ($hero['photo'] ?? ($profile['photo'] ?? ''))) ? upload_url('profile/'.$p) : base_url('assets/images/avatar.svg') ?>" alt="<?= e($profile['name'] ?? '') ?>">
      </div>
    </div>
  </div>
  <a href="#about" class="scroll-hint"><i class="bi bi-mouse"></i></a>
</section>

<!-- ===================== ABOUT ===================== -->
<?php if ($about): ?>
<section id="about">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">About Me</p>
      <h2 class="section-title">Get to know me</h2>
    </div>
    <div class="about-grid">
      <div data-aos="fade-right">
        <img class="about-photo" src="<?= ($ap = ($about['photo'] ?? ($profile['photo'] ?? ''))) ? upload_url('profile/'.$ap) : base_url('assets/images/avatar.svg') ?>" alt="About">
      </div>
      <div data-aos="fade-left">
        <?php if (($about['freelance'] ?? '') !== ''): ?><span class="<?= ($about['freelance'] == 'Available') ? 'badge-avail' : 'badge-unavail' ?>"><?= e($about['freelance']) ?> for freelance</span><?php endif; ?>
        <p style="margin-top:1rem"><?= nl2br(e($about['description'] ?? '')) ?></p>
        <ul class="about-facts">
          <?php if ( ! empty($about['age'])): ?><li><strong>Age</strong> <?= e($about['age']) ?></li><?php endif; ?>
          <?php if ( ! empty($about['domicile'])): ?><li><strong>Location</strong> <?= e($about['domicile']) ?></li><?php endif; ?>
          <?php if ( ! empty($about['email'])): ?><li><strong>Email</strong> <?= e($about['email']) ?></li><?php endif; ?>
          <?php if ( ! empty($about['phone'])): ?><li><strong>Phone</strong> <?= e($about['phone']) ?></li><?php endif; ?>
        </ul>
        <div class="stats-row">
          <div class="stat glass"><b><?= (int)($about['experience_years'] ?? 0) ?>+</b><span>Years Experience</span></div>
          <div class="stat glass"><b><?= (int)($about['projects_done'] ?? 0) ?>+</b><span>Projects Done</span></div>
          <div class="stat glass"><b><?= (int)($about['happy_clients'] ?? 0) ?>+</b><span>Happy Clients</span></div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== SKILLS ===================== -->
<?php if ( ! empty($skills)): ?>
<section id="skills" style="background:var(--surface)">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">My Skills</p>
      <h2 class="section-title">Technologies I work with</h2>
    </div>
    <div class="skills-cats">
      <?php foreach ($skills as $category => $items): ?>
      <div class="skill-card glass" data-aos="fade-up">
        <h4><i class="bi <?= e($skill_icons[$category] ?? 'bi-code-slash') ?>"></i> <?= e($category) ?></h4>
        <?php foreach ($items as $sk): ?>
        <div class="skill-item">
          <div class="top"><span><i class="bi <?= e($sk['icon'] ?: 'bi-dot') ?>"></i> <?= e($sk['name']) ?></span><span><?= (int)$sk['percentage'] ?>%</span></div>
          <div class="progress-track"><div class="progress-fill" data-value="<?= (int)$sk['percentage'] ?>" style="background:<?= e($sk['color'] ?: 'var(--accent)') ?>"></div></div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== EXPERIENCE + EDUCATION ===================== -->
<?php if ( ! empty($experiences) || ! empty($educations)): ?>
<section id="experience">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">Resume</p>
      <h2 class="section-title">Experience &amp; Education</h2>
    </div>
    <div class="about-grid" style="align-items:flex-start;gap:2rem">
      <?php if ( ! empty($experiences)): ?>
      <div data-aos="fade-right">
        <h3 style="margin-bottom:1.5rem"><i class="bi bi-briefcase"></i> Experience</h3>
        <div class="timeline">
          <?php foreach ($experiences as $x): ?>
          <div class="tl-item">
            <div class="card-inner glass">
              <span class="meta"><?= e($x['start_date']) ?> — <?= e($x['end_date'] ?: 'Present') ?></span>
              <h4><?= e($x['position']) ?></h4>
              <span class="company"><?= e($x['company']) ?></span>
              <p class="text-muted-2" style="font-size:.92rem;margin:.6rem 0 0"><?= e($x['description']) ?></p>
              <?php if ($x['technology']): ?><div class="tags"><?php foreach (explode(',', $x['technology']) as $t): ?><span class="tag"><?= e(trim($t)) ?></span><?php endforeach; ?></div><?php endif; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
      <?php if ( ! empty($educations)): ?>
      <div data-aos="fade-left">
        <h3 style="margin-bottom:1.5rem"><i class="bi bi-mortarboard"></i> Education</h3>
        <div class="timeline">
          <?php foreach ($educations as $ed): ?>
          <div class="tl-item">
            <div class="card-inner glass">
              <span class="meta"><?= e($ed['start_year']) ?> — <?= e($ed['end_year']) ?></span>
              <h4><?= e($ed['major']) ?></h4>
              <span class="company"><?= e($ed['institution']) ?><?= $ed['gpa'] ? ' · GPA '.e($ed['gpa']) : '' ?></span>
              <p class="text-muted-2" style="font-size:.92rem;margin:.6rem 0 0"><?= e($ed['description']) ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== PORTFOLIO ===================== -->
<?php if ( ! empty($portfolios)): ?>
<section id="portfolio" style="background:var(--surface)">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">Portfolio</p>
      <h2 class="section-title">Selected projects</h2>
    </div>
    <div class="filters" data-aos="fade-up">
      <button class="filter-btn active" data-filter="all">All</button>
      <?php foreach ($categories as $c): ?><button class="filter-btn" data-filter="<?= e($c) ?>"><?= e($c) ?></button><?php endforeach; ?>
    </div>
    <div class="portfolio-grid">
      <?php foreach ($portfolios as $p): ?>
      <div class="pf-card glass" data-category="<?= e($p['category']) ?>" data-aos="fade-up">
        <div class="pf-thumb">
          <img src="<?= $p['thumbnail'] ? upload_url('portfolio/'.$p['thumbnail']) : base_url('assets/images/placeholder.svg') ?>" alt="<?= e($p['title']) ?>" loading="lazy">
          <?php if ($p['category']): ?><span class="pf-badge"><?= e($p['category']) ?></span><?php endif; ?>
          <?php if ($p['featured']): ?><i class="bi bi-star-fill pf-featured" title="Featured"></i><?php endif; ?>
        </div>
        <div class="pf-body">
          <h4><?= e($p['title']) ?></h4>
          <p><?= e(excerpt($p['description'], 90)) ?></p>
          <div class="pf-links">
            <a href="<?= site_url('portfolio/'.$p['slug']) ?>" class="btn btn-ghost btn-sm"><i class="bi bi-eye"></i> Details</a>
            <?php if ($p['demo_url']): ?><a href="<?= e($p['demo_url']) ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><i class="bi bi-box-arrow-up-right"></i></a><?php endif; ?>
            <?php if ($p['github_url']): ?><a href="<?= e($p['github_url']) ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><i class="bi bi-github"></i></a><?php endif; ?>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== SERVICES ===================== -->
<?php if ( ! empty($services)): ?>
<section id="services">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">Services</p>
      <h2 class="section-title">What I can do for you</h2>
    </div>
    <div class="services-grid">
      <?php foreach ($services as $sv): ?>
      <div class="service-card glass" data-aos="fade-up">
        <div class="ico"><i class="bi <?= e($sv['icon'] ?: 'bi-gear') ?>"></i></div>
        <h4><?= e($sv['title']) ?></h4>
        <p><?= e($sv['description']) ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== CERTIFICATES ===================== -->
<?php if ( ! empty($certificates)): ?>
<section id="certificates" style="background:var(--surface)">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">Certificates</p>
      <h2 class="section-title">Credentials &amp; achievements</h2>
    </div>
    <div class="cert-grid">
      <?php foreach ($certificates as $ct): ?>
      <div class="cert-card glass" data-aos="fade-up">
        <div class="ico"><i class="bi bi-patch-check-fill"></i></div>
        <div>
          <h4><?= e($ct['title']) ?></h4>
          <span class="issuer"><?= e($ct['issuer']) ?> · <?= format_date($ct['issue_date'], 'M Y') ?></span>
          <?php if ($ct['credential_url']): ?><div style="margin-top:.5rem"><a href="<?= e($ct['credential_url']) ?>" target="_blank" rel="noopener" class="btn btn-ghost btn-sm"><i class="bi bi-link-45deg"></i> Verify</a></div><?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== TESTIMONIALS ===================== -->
<?php if ( ! empty($testimonials)): ?>
<section id="testimonials">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">Testimonials</p>
      <h2 class="section-title">What people say</h2>
    </div>
    <div class="testi-grid">
      <?php foreach ($testimonials as $t): ?>
      <div class="testi-card glass" data-aos="fade-up">
        <div class="stars"><?= rating_stars($t['rating']) ?></div>
        <p>“<?= e($t['message']) ?>”</p>
        <div class="testi-who">
          <img src="<?= $t['photo'] ? upload_url('testimonials/'.$t['photo']) : base_url('assets/images/avatar.svg') ?>" alt="<?= e($t['name']) ?>">
          <div><b><?= e($t['name']) ?></b><span><?= e($t['position']) ?></span></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ===================== CONTACT ===================== -->
<section id="contact" style="background:var(--surface)">
  <div class="container">
    <div class="section-head" data-aos="fade-up">
      <p class="section-eyebrow">Contact</p>
      <h2 class="section-title">Let's work together</h2>
    </div>
    <div class="contact-grid">
      <div data-aos="fade-right">
        <ul class="contact-info" style="padding:0">
          <?php if ( ! empty($profile['email'])): ?><li><span class="ico"><i class="bi bi-envelope"></i></span><div><b>Email</b><span><?= e($profile['email']) ?></span></div></li><?php endif; ?>
          <?php if ( ! empty($profile['phone'])): ?><li><span class="ico"><i class="bi bi-telephone"></i></span><div><b>Phone</b><span><?= e($profile['phone']) ?></span></div></li><?php endif; ?>
          <?php if ($wa = setting('whatsapp')): ?><li><span class="ico"><i class="bi bi-whatsapp"></i></span><div><b>WhatsApp</b><span><a href="https://wa.me/<?= e($wa) ?>" target="_blank" rel="noopener"><?= e($wa) ?></a></span></div></li><?php endif; ?>
          <?php if ( ! empty($profile['address'])): ?><li><span class="ico"><i class="bi bi-geo-alt"></i></span><div><b>Address</b><span><?= e($profile['address']) ?></span></div></li><?php endif; ?>
        </ul>
        <?php if ($map = setting('map_embed')): ?><div class="glass" style="overflow:hidden;border-radius:var(--radius)"><?= $map ?></div><?php endif; ?>
      </div>
      <div class="glass" style="padding:2rem" data-aos="fade-left">
        <?= form_open('contact/send', array('id' => 'contact-form')) ?>
          <div class="form-group"><input class="form-control" name="name" placeholder="Your Name" required></div>
          <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Your Email" required></div>
          <div class="form-group"><input class="form-control" name="subject" placeholder="Subject"></div>
          <div class="form-group"><textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea></div>
          <button type="submit" class="btn btn-primary"><i class="bi bi-send"></i> Send Message</button>
          <p class="form-note"></p>
        <?= form_close() ?>
      </div>
    </div>
  </div>
</section>

<?php $this->load->view('layouts/footer'); ?>
