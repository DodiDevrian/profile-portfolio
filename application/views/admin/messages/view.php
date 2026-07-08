<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head"><div><h1>Message</h1><div class="breadcrumb"><a href="<?= site_url('admin/messages') ?>">Messages</a> / View</div></div>
  <a href="<?= site_url('admin/messages') ?>" class="btn btn-ghost btn-sm"><i class="bi bi-arrow-left"></i> Back</a>
</div>
<div class="card">
  <div class="form-row">
    <div><label>From</label><p><b><?= e($msg['name']) ?></b></p></div>
    <div><label>Email</label><p><a href="mailto:<?= e($msg['email']) ?>"><?= e($msg['email']) ?></a></p></div>
    <div><label>Received</label><p><?= format_date($msg['created_at'], 'd M Y H:i') ?></p></div>
    <div><label>IP</label><p><?= e($msg['ip_address'] ?: '—') ?></p></div>
  </div>
  <label>Subject</label>
  <p style="font-size:1.1rem"><b><?= e($msg['subject'] ?: '(no subject)') ?></b></p>
  <label>Message</label>
  <div style="background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:1rem;white-space:pre-wrap"><?= e($msg['message']) ?></div>
  <div style="margin-top:1.4rem;display:flex;gap:.6rem">
    <a href="mailto:<?= e($msg['email']) ?>?subject=RE: <?= rawurlencode($msg['subject']) ?>" class="btn btn-primary"><i class="bi bi-reply"></i> Reply via Email</a>
    <a href="<?= site_url('admin/messages/toggle_reply/'.$msg['id']) ?>" class="btn btn-ghost"><i class="bi bi-check2-circle"></i> Mark as <?= $msg['is_replied'] ? 'not replied' : 'replied' ?></a>
    <?= form_open('admin/messages/delete/'.$msg['id'], array('data-confirm'=>'Delete this message?','style'=>'display:inline')) ?><button class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button><?= form_close() ?>
  </div>
</div>
