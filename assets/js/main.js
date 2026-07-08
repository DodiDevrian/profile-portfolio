/* Public site interactions */
(function () {
  'use strict';

  var nav = document.querySelector('.navbar');
  var toggle = document.querySelector('.nav-toggle');
  var links = document.querySelector('.nav-links');
  var backTop = document.querySelector('.back-top');

  // Navbar solid on scroll + back-to-top visibility
  function onScroll() {
    if (window.scrollY > 40) nav && nav.classList.add('scrolled');
    else nav && nav.classList.remove('scrolled');
    if (backTop) backTop.classList.toggle('show', window.scrollY > 500);
  }
  window.addEventListener('scroll', onScroll);
  onScroll();

  // Mobile menu
  if (toggle && links) {
    toggle.addEventListener('click', function () { links.classList.toggle('open'); });
    links.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { links.classList.remove('open'); });
    });
  }

  // Back to top
  if (backTop) {
    backTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // Active nav link on scroll (scroll-spy)
  var sections = Array.prototype.slice.call(document.querySelectorAll('section[id]'));
  var navAnchors = Array.prototype.slice.call(document.querySelectorAll('.nav-links a'));
  window.addEventListener('scroll', function () {
    var pos = window.scrollY + 120;
    sections.forEach(function (sec) {
      var link = navAnchors.find(function (a) { return a.getAttribute('href') === '#' + sec.id; });
      if (!link) return;
      if (pos >= sec.offsetTop && pos < sec.offsetTop + sec.offsetHeight) {
        navAnchors.forEach(function (a) { a.classList.remove('active'); });
        link.classList.add('active');
      }
    });
  });

  // Reveal on scroll (progress bars + [data-reveal])
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (!en.isIntersecting) return;
      var el = en.target;
      el.classList.add('in');
      if (el.classList.contains('progress-fill')) {
        el.style.width = (el.getAttribute('data-value') || 0) + '%';
      }
      io.unobserve(el);
    });
  }, { threshold: 0.2 });
  document.querySelectorAll('[data-reveal],.progress-fill').forEach(function (el) { io.observe(el); });

  // Portfolio filter
  var filterBtns = document.querySelectorAll('.filter-btn');
  var pfCards = document.querySelectorAll('.pf-card');
  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      filterBtns.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');
      var cat = btn.getAttribute('data-filter');
      pfCards.forEach(function (card) {
        var show = cat === 'all' || card.getAttribute('data-category') === cat;
        card.style.display = show ? '' : 'none';
      });
    });
  });

  // Typed effect (uses Typed.js if present, else simple fallback)
  var typedEl = document.querySelector('[data-typed]');
  if (typedEl) {
    var words = (typedEl.getAttribute('data-typed') || '').split(',').map(function (s) { return s.trim(); }).filter(Boolean);
    if (window.Typed && words.length) {
      new window.Typed(typedEl, { strings: words, typeSpeed: 60, backSpeed: 35, backDelay: 1400, loop: true });
    } else if (words.length) {
      typedEl.textContent = words[0];
    }
  }

  // Contact form via AJAX
  var form = document.getElementById('contact-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var note = form.querySelector('.form-note');
      var btn = form.querySelector('button[type=submit]');
      note.className = 'form-note';
      note.textContent = 'Sending…';
      btn.disabled = true;

      fetch(form.action, { method: 'POST', body: new FormData(form) })
        .then(function (r) { return r.json().then(function (d) { return { ok: r.ok, d: d }; }); })
        .then(function (res) {
          note.className = 'form-note ' + (res.d.status === 'success' ? 'success' : 'error');
          note.textContent = res.d.message;
          if (res.d.status === 'success') {
            form.reset();
            // refresh CSRF token if present
            if (res.d.csrf_name && res.d.csrf_hash) {
              var t = form.querySelector('input[name="' + res.d.csrf_name + '"]');
              if (t) t.value = res.d.csrf_hash;
            }
          }
        })
        .catch(function () { note.className = 'form-note error'; note.textContent = 'Something went wrong. Please try again.'; })
        .finally(function () { btn.disabled = false; });
    });
  }
})();
