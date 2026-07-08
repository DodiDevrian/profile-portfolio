<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="page-head">
  <div><h1>Dashboard</h1><div class="breadcrumb">Overview of your portfolio</div></div>
  <a href="<?= base_url() ?>" target="_blank" class="btn btn-ghost"><i class="bi bi-box-arrow-up-right"></i> View Site</a>
</div>

<div class="grid-stats">
  <?php
  $cards = array(
    array('Projects', $stats['projects'], 'bi-collection', '#38BDF8', 'portfolio'),
    array('Skills', $stats['skills'], 'bi-bar-chart', '#22C55E', 'skills'),
    array('Certificates', $stats['certificates'], 'bi-patch-check', '#F59E0B', 'certificates'),
    array('Testimonials', $stats['testimonials'], 'bi-chat-quote', '#6366F1', 'testimonials'),
    array('Visitors', $stats['visitors'], 'bi-people', '#0EA5E9', 'dashboard'),
    array('Unread Messages', $stats['unread'], 'bi-envelope', '#EF4444', 'messages'),
  );
  foreach ($cards as $c): ?>
  <a href="<?= site_url('admin/'.$c[4]) ?>" class="stat-card">
    <div class="ico" style="background:<?= $c[3] ?>22;color:<?= $c[3] ?>"><i class="bi <?= $c[2] ?>"></i></div>
    <div><b><?= (int)$c[1] ?></b><span><?= $c[0] ?></span></div>
  </a>
  <?php endforeach; ?>
</div>

<div class="card">
  <h3>Visitors — last 7 days</h3>
  <canvas id="visitorsChart" height="90"></canvas>
</div>

<div class="card">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h3 style="margin:0">Recent Messages</h3>
    <a href="<?= site_url('admin/messages') ?>" class="btn btn-ghost btn-sm">View all</a>
  </div>
  <div class="table-wrap" style="margin-top:1rem">
    <table>
      <thead><tr><th>Name</th><th>Subject</th><th>Received</th><th></th></tr></thead>
      <tbody>
        <?php if (empty($recent)): ?>
          <tr><td colspan="4" class="empty"><i class="bi bi-inbox"></i> No messages yet</td></tr>
        <?php else: foreach ($recent as $m): ?>
          <tr>
            <td><?= e($m['name']) ?> <?php if(!$m['is_read']): ?><span class="badge badge-blue">new</span><?php endif; ?></td>
            <td><?= e($m['subject'] ?: '—') ?></td>
            <td><?= format_date($m['created_at'], 'd M Y H:i') ?></td>
            <td><a href="<?= site_url('admin/messages/view/'.$m['id']) ?>" class="btn btn-ghost btn-sm">Open</a></td>
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
const ctx = document.getElementById('visitorsChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?= json_encode($chart['labels']) ?>,
    datasets: [{
      label: 'Visitors',
      data: <?= json_encode($chart['data']) ?>,
      borderColor: '#38BDF8', backgroundColor: 'rgba(56,189,248,.15)',
      fill: true, tension: .4, pointRadius: 4, pointBackgroundColor: '#38BDF8'
    }]
  },
  options: {
    plugins:{legend:{display:false}},
    scales:{
      x:{grid:{color:'#33415555'},ticks:{color:'#94A3B8'}},
      y:{grid:{color:'#33415555'},ticks:{color:'#94A3B8'},beginAtZero:true}
    }
  }
});
</script>
