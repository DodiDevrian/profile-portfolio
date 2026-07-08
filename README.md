# Dynamic Portfolio CMS

A modern, dark, premium **personal portfolio website** with a full **admin dashboard** — every
section of the public site is editable from the admin panel, no code changes required.

Built with **CodeIgniter 3** (MVC), **Bootstrap-Icons**, **AOS**, **Typed.js**, **Chart.js**,
MySQL/MariaDB, and a hand-rolled design system based on the PRD.

---

## ✨ Features

**Public (one-page scroll landing):**
Hero · About · Skills (grouped by category, animated progress bars) · Experience & Education
timelines · Portfolio grid with category filter + detail pages + gallery · Services · Certificates
· Testimonials · AJAX Contact form · Footer with social links & back-to-top.

**Admin dashboard (`/admin`):**
Stats + visitor chart · Profile · Hero · About · Skills · Experience · Education · Portfolio
(with slug + multi-image gallery) · Services · Certificates · Testimonials · Messages (view /
reply-status / delete / **CSV export**) · Resume (PDF upload + preview) · Settings (SEO, logo,
favicon, analytics, maps, modes).

**Cross-cutting:** session auth, CSRF protection, XSS-escaped output, Query-Builder-only DB
access, image/PDF uploads, SEO meta + Open Graph, fully responsive.

---

## 🚀 Quick Start

### Requirements
- PHP **7.4 – 8.2** with `mysqli`
- MySQL / MariaDB
- Apache with `mod_rewrite` (or PHP built-in server for local dev)

### 1. Database
```bash
mysql -u root < database.sql
```
This creates the `portfolio_cms` database, all tables, and demo seed data.

### 2. Configure
Edit `application/config/database.php` if your MySQL credentials differ
(defaults: host `localhost`, user `root`, no password, db `portfolio_cms`).

Set your URL in `application/config/config.php`:
```php
$config['base_url'] = 'http://localhost:8080/';
```

### 3. Run

**XAMPP / Laragon:** drop the folder into `htdocs`/`www` and open
`http://localhost/profile-codex-kiro/`.

**PHP built-in server (dev):**
```bash
php -S localhost:8080
```
Then open `http://localhost:8080/`.
> On the built-in server (no `.htaccess`) URLs go through `index.php`, e.g.
> `http://localhost:8080/index.php/admin`. On Apache the `.htaccess` gives clean URLs.

### 4. Log in
```
URL:      /admin
Email:    admin@portfolio.test
Password: admin123
```

---

## 🗂 Project Structure

```
application/
├── config/            # config, database, routes, autoload
├── core/              # MY_Controller (Public/Admin base), MY_Model (base CRUD)
├── controllers/       # Home, Portfolio, Contact, Auth + admin/*
├── models/            # one model per entity (+ Dashboard, Visitor)
├── helpers/           # general_helper.php (slugify, upload, escape, etc.)
└── views/
    ├── layouts/       # public header/footer
    ├── home/ portfolio/ auth/
    └── admin/         # layout + one folder per section
assets/
├── css/               # style.css (public), admin.css
├── js/                # main.js
├── images/            # svg placeholders
└── uploads/           # profile, portfolio, certificates, testimonials, resume, ...
system/                # CodeIgniter 3 framework (untouched)
database.sql           # schema + seed
index.php              # front controller
```

---

## 🎨 Design System

Dark premium theme (Apple / Vercel / Linear inspired). Palette, radius, typography and
component styles live as CSS variables at the top of `assets/css/style.css`:

| Token | Value |
|-------|-------|
| Background | `#020617` |
| Card | `#1F2937` |
| Accent | `#38BDF8` |
| Text | `#F8FAFC` |
| Radius | `16px` |

Fonts: **Poppins** (headings), **Inter** (body), **JetBrains Mono** (code).

---

## 🔐 Notes on Security

- All admin controllers extend `Admin_Controller`, which enforces a logged-in session.
- CSRF protection is enabled globally (`config['csrf_protection'] = TRUE`); the AJAX contact
  form returns a refreshed token on each request.
- Output is escaped via the `e()` helper; DB access uses the Query Builder only.
- Passwords use `password_hash()` / `password_verify()`.

## 📦 Deployment

Works on any PHP + MySQL host (shared cPanel, VPS Apache/Nginx, aaPanel, Docker).
For production, set `CI_ENV=production` (e.g. via `SetEnv CI_ENV production` in `.htaccess`)
and change `base_url` + the `encryption_key` in `config.php`.

---

## Default Seed Accounts / Data

The seed includes a demo profile ("John Doe"), 10 skills, 3 experiences, 2 educations,
4 projects, 5 services, 3 certificates, 3 testimonials and site settings — all editable
from the admin panel. Replace them with your own content.
