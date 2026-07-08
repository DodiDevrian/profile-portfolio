<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1>Resume</h1><div class="breadcrumb">Upload your CV / Resume (PDF)</div></div></div>

<div class="card">
  <?php if ( ! empty($profile['resume'])): ?>
    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:1.2rem">
      <i class="bi bi-file-earmark-pdf" style="font-size:2.4rem;color:var(--danger)"></i>
      <div>
        <b>Current resume</b><br>
        <small style="color:var(--text-muted)"><?= e($profile['resume']) ?></small>
      </div>
      <div style="margin-left:auto;display:flex;gap:.5rem">
        <a href="<?= upload_url('resume/'.$profile['resume']) ?>" target="_blank" class="btn btn-ghost btn-sm"><i class="bi bi-eye"></i> Preview</a>
        <?= form_open('admin/resume/delete', array('data-confirm'=>'Remove resume?','style'=>'display:inline')) ?><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button><?= form_close() ?>
      </div>
    </div>
    <iframe src="<?= upload_url('resume/'.$profile['resume']) ?>" style="width:100%;height:520px;border:1px solid var(--border);border-radius:12px"></iframe>
  <?php else: ?>
    <div class="empty"><i class="bi bi-file-earmark-pdf"></i> No resume uploaded yet</div>
  <?php endif; ?>
</div>

<div class="card">
  <?= form_open_multipart('admin/resume') ?>
    <div class="form-group"><label>Upload new resume (PDF, max 8MB)</label><input class="form-control" type="file" name="resume" accept="application/pdf" required></div>
    <button class="btn btn-primary"><i class="bi bi-upload"></i> Upload Resume</button>
  <?= form_close() ?>
</div>
