# PRD.md

# Personal Portfolio CMS

## Product Requirements Document (PRD)

---

# 1. Project Overview

## Nama Project

**Dynamic Portfolio Website**

## Deskripsi

Website portfolio modern yang memungkinkan pemilik website mengubah seluruh isi website melalui halaman admin tanpa perlu mengubah kode.

Website berfungsi sebagai identitas profesional yang menampilkan:

* Biodata
* Tentang Saya
* Skill
* Experience
* Education
* Portfolio
* Project
* Sertifikat
* Blog (Optional)
* Contact
* Resume
* Social Media

Seluruh konten bersifat **dynamic** sehingga dapat diubah kapan saja melalui Dashboard Admin.

---

# 2. Tujuan

Membuat website portfolio yang:

* Modern
* Elegant
* Fast Loading
* SEO Friendly
* Responsive
* Mudah di-maintain
* Mudah menambah project baru
* Mudah mengganti foto
* Mudah mengubah informasi pribadi

---

# 3. Target User

### Primary User

Pemilik website

### Visitor

* HRD
* Recruiter
* Client
* Freelancer
* Company
* Teman
* Pengunjung umum

---

# 4. User Role

## Admin

Dapat mengelola seluruh isi website.

## Visitor

Hanya melihat informasi.

---

# 5. Sitemap

Home

About

Skills

Experience

Education

Portfolio

Services

Testimonials

Certificate

Blog (Optional)

Contact

Resume

Admin Dashboard

---

# 6. Landing Page

Landing Page menggunakan konsep **One Page Scroll**.

Section:

Hero

About

Skills

Experience

Education

Portfolio

Services

Certificate

Testimonials

Contact

Footer

---

# 7. Hero Section

Isi:

* Foto Profile
* Nama
* Job Title
* Short Description
* Button Download CV
* Button Contact Me
* Social Media

Background:

Dark Gradient

Animasi:

* Fade
* Floating Shape
* Smooth Scroll

---

# 8. About Me

Menampilkan:

* Foto
* Deskripsi
* Umur
* Domisili
* Email
* Telepon
* Freelance Status

Button:

Download CV

---

# 9. Skills

Kategori:

Frontend

Backend

Database

Mobile

Tools

Cloud

Setiap skill memiliki:

* Nama
* Icon
* Persentase
* Warna

Contoh

Laravel

PHP

Javascript

Vue

React

MySQL

Docker

Git

Linux

Redis

---

# 10. Experience

Berisi:

Nama Perusahaan

Logo

Posisi

Tanggal

Deskripsi

Technology

---

# 11. Education

Berisi:

Institusi

Logo

Jurusan

Tahun

IPK (optional)

Deskripsi

---

# 12. Portfolio

Grid Card Modern

Setiap Project memiliki:

Thumbnail

Judul

Kategori

Technology

Description

Gallery

Github

Demo

Status

Featured

Filter berdasarkan kategori.

---

# 13. Services

Contoh

Website Development

Backend API

System Analysis

UI Implementation

Consultation

---

# 14. Certificate

Menampilkan:

Preview

Nama Sertifikat

Penerbit

Tanggal

Credential URL

---

# 15. Testimonials

Menampilkan:

Foto

Nama

Jabatan

Isi Testimoni

Rating

---

# 16. Blog (Optional)

CRUD Artikel

Kategori

Tag

Thumbnail

SEO

---

# 17. Contact

Form:

Nama

Email

Subject

Message

Button Send

Tambahan:

Google Maps

Email

Whatsapp

Alamat

---

# 18. Footer

Copyright

Social Media

Quick Menu

Back To Top

---

# 19. Admin Dashboard

Sidebar

Dashboard

Profile

Hero

About

Skills

Experience

Education

Portfolio

Services

Certificates

Testimonials

Blog

Messages

Resume

Settings

Logout

---

# 20. Dashboard

Menampilkan statistik:

Total Project

Total Skill

Total Visitor

Total Certificate

Total Blog

Unread Message

---

# 21. Manage Profile

CRUD

Field:

Nama

Foto

Title

Bio

Email

Phone

Address

Birthday

Linkedin

Github

Instagram

Facebook

Twitter

Youtube

Website

Resume

---

# 22. Hero Management

Edit:

Background

Title

Subtitle

Button

Photo

Animation

---

# 23. About Management

CRUD

Foto

Description

Facts

---

# 24. Skills Management

CRUD

Nama Skill

Kategori

Icon

Progress

Color

Urutan

---

# 25. Experience Management

CRUD

Logo

Company

Position

Date

Description

Technology

Order

---

# 26. Education Management

CRUD

Institution

Logo

Major

Description

Year

---

# 27. Portfolio Management

CRUD

Thumbnail

Gallery

Project Name

Slug

Description

Technology

Github

Demo

Category

Featured

Status

SEO

---

# 28. Service Management

CRUD

Icon

Title

Description

---

# 29. Certificate Management

CRUD

Image

Title

Issuer

Date

Credential Link

---

# 30. Testimonials Management

CRUD

Photo

Name

Position

Message

Rating

---

# 31. Contact Messages

List pesan

Detail

Delete

Reply Status

Export CSV

---

# 32. Resume Management

Upload

PDF

Preview

Version

---

# 33. Settings

Website Title

Logo

Favicon

Meta Title

Meta Description

Keywords

Google Analytics

Facebook Pixel

Maintenance Mode

Dark Mode

---

# 34. Authentication

Login

Logout

Forgot Password

Remember Me

Change Password

Profile

---

# 35. Database

users

profiles

hero

abouts

skills

experiences

educations

portfolios

portfolio_images

services

certificates

testimonials

blogs

blog_categories

messages

settings

social_medias

visitors

---

# 36. Tech Stack

## Backend

* CodeIgniter 3 (MVC Architecture)
* PHP 8.1+ (Compatible dengan CI3)
* REST API (Optional)

## Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript (ES6)
* jQuery 3.x
* AJAX

## Database

* MySQL / MariaDB

## Web Server

* Apache
* Nginx

## Authentication

* Session Library CodeIgniter 3
* Custom Login Authentication
* Password Hashing (password_hash & password_verify)

## Storage

* Local Storage
* Upload Library CodeIgniter 3

## File Manager

* Upload Image
* Upload PDF Resume
* Image Compression (Optional)

## Email

* SMTP Gmail
* SMTP Mailtrap
* SMTP Hosting

## Animation

* AOS (Animate On Scroll)
* GSAP
* Typed.js

## Icons

* Bootstrap Icons
* Font Awesome 6

## Charts

* Chart.js

## Rich Text Editor

* TinyMCE

## Image Upload

* CodeIgniter Upload Library
* Drag & Drop Upload (Dropzone.js)

## Additional Libraries

* SweetAlert2
* DataTables
* Select2
* Toastr Notification
* Lightbox Gallery
* Masonry.js (Portfolio Grid)

---

# 37. Project Structure (CodeIgniter 3)

```
application/
│
├── config/
├── controllers/
│   ├── Home.php
│   ├── About.php
│   ├── Portfolio.php
│   ├── Blog.php
│   ├── Contact.php
│   ├── Auth.php
│   └── admin/
│       ├── Dashboard.php
│       ├── Profile.php
│       ├── Hero.php
│       ├── About.php
│       ├── Skills.php
│       ├── Experience.php
│       ├── Education.php
│       ├── Portfolio.php
│       ├── Services.php
│       ├── Certificates.php
│       ├── Testimonials.php
│       ├── Blog.php
│       ├── Messages.php
│       ├── Resume.php
│       └── Settings.php
│
├── models/
│   ├── Profile_model.php
│   ├── Hero_model.php
│   ├── Skill_model.php
│   ├── Experience_model.php
│   ├── Education_model.php
│   ├── Portfolio_model.php
│   ├── Service_model.php
│   ├── Certificate_model.php
│   ├── Testimonial_model.php
│   ├── Blog_model.php
│   ├── Message_model.php
│   └── Setting_model.php
│
├── views/
│   ├── layouts/
│   │   ├── header.php
│   │   ├── navbar.php
│   │   ├── footer.php
│   │   └── scripts.php
│   │
│   ├── home/
│   ├── portfolio/
│   ├── blog/
│   ├── contact/
│   │
│   └── admin/
│       ├── dashboard/
│       ├── profile/
│       ├── hero/
│       ├── about/
│       ├── skills/
│       ├── experience/
│       ├── education/
│       ├── portfolio/
│       ├── services/
│       ├── certificates/
│       ├── testimonials/
│       ├── blog/
│       ├── messages/
│       ├── resume/
│       └── settings/
│
├── helpers/
├── libraries/
├── hooks/
├── language/
└── third_party/

assets/
├── css/
├── js/
├── images/
├── uploads/
│   ├── profile/
│   ├── portfolio/
│   ├── certificates/
│   ├── blog/
│   └── resume/
├── fonts/
└── vendor/

system/
index.php
```

---

# 38. Coding Standard

* Menggunakan pola MVC bawaan CodeIgniter 3.
* Seluruh query database menggunakan Query Builder (Active Record).
* Tidak menggunakan query SQL mentah kecuali diperlukan.
* Semua controller admin menggunakan autentikasi session.
* Validasi form menggunakan Form Validation Library.
* Upload file menggunakan Upload Library.
* Helper dipakai untuk fungsi umum (format tanggal, slug, upload, dll.).
* Konfigurasi dipisahkan pada folder `application/config`.
* URL menggunakan format SEO Friendly (`base_url()` dan `site_url()`).
* Asset dipanggil menggunakan helper URL agar mudah dipindahkan ke hosting.

---

# 39. Deployment

Environment yang didukung:

* XAMPP (Development)
* Laragon (Development)
* Shared Hosting (cPanel)
* VPS Ubuntu + Apache
* VPS Ubuntu + Nginx
* aaPanel
* Docker (Opsional)

Karena menggunakan CodeIgniter 3, aplikasi dapat di-deploy dengan mudah pada hampir semua layanan hosting yang mendukung PHP dan MySQL tanpa konfigurasi yang kompleks.


# 40. UI Design

Style:

Simple

Elegant

Minimalist

Professional

Premium

Luxury

---

# 41. Design System

Border Radius

16px

Button

Rounded

Card

Glassmorphism

Shadow

Soft Shadow

Animation

Smooth

Hover

Scale

Fade

Slide

---

# 42. Color Palette

## Primary

#0F172A

## Secondary

#1E293B

## Background

#020617

## Surface

#111827

## Card

#1F2937

## Accent

#38BDF8

## Accent Hover

#0EA5E9

## Success

#22C55E

## Warning

#F59E0B

## Danger

#EF4444

## Text Primary

#F8FAFC

## Text Secondary

#94A3B8

## Border

#334155

---

# 43. Typography

Heading

Poppins

Body

Inter

Code

JetBrains Mono

---

# 44. Components

Navbar

Hero

Cards

Timeline

Progress Bar

Gallery

Modal

Badge

Tag

Button

Accordion

Tabs

Toast

Breadcrumb

Sidebar

Table

Charts

Pagination

Search

Filter

Loading Skeleton

---

# 45. Responsive

Desktop

Laptop

Tablet

Mobile

---

# 46. Performance

Lazy Loading

Image Optimization

Minify Assets

Caching

SEO Friendly

Accessibility

Fast Rendering

---

# 47. Security

CSRF Protection

XSS Protection

SQL Injection Protection

Input Validation

Authentication Middleware

Rate Limiter

Password Hashing

---

# 48. Future Development

Multi Theme

Light Mode

Dark Mode

Multiple Language

Portfolio Analytics

Visitor Tracking

Project Like

Project Comment

Blog System

Newsletter

CMS API

Admin Activity Log

Google OAuth

GitHub OAuth

Resume Versioning

AI Portfolio Generator

Open Graph Generator

Portfolio QR Code

Progressive Web App (PWA)

---

# 49. UI/UX Direction

## Visual Style

Modern Dark Portfolio dengan nuansa premium yang mengutamakan kesederhanaan dan kenyamanan membaca.

## Inspirasi

* Apple
* Vercel
* Linear
* Framer
* Raycast
* GitHub
* Stripe
* Supabase

## Layout

* Sticky Navbar transparan yang berubah solid saat di-scroll.
* Hero fullscreen dengan foto profil berbentuk lingkaran atau rounded.
* Section dipisahkan menggunakan whitespace yang luas.
* Card portfolio menggunakan efek glassmorphism ringan.
* Timeline untuk Experience dan Education.
* Animasi scroll yang halus menggunakan AOS/GSAP.
* Hover pada card menggunakan efek lift dan shadow lembut.
* Tombol CTA dengan aksen biru terang agar kontras di atas tema gelap.
* Footer minimalis dengan ikon sosial media dan copyright.

## Prinsip UI

* Fokus pada keterbacaan.
* Konsisten dalam spacing (8px grid system).
* Kontras tinggi antara teks dan background.
* Maksimal 2 jenis font.
* Ikon bergaya outline modern.
* Transisi 200–300 ms untuk interaksi agar terasa halus namun responsif.

---

# 50. Success Criteria

* Semua konten dapat dikelola melalui dashboard admin.
* Website responsif di seluruh ukuran layar.
* Waktu muat halaman cepat (< 2 detik pada koneksi normal).
* Struktur SEO dasar tersedia (meta title, description, Open Graph).
* Mudah diperluas dengan fitur baru tanpa mengubah struktur utama.
* Tampilan memberikan kesan profesional, elegan, dan modern sehingga cocok digunakan sebagai personal branding maupun portofolio freelancer/developer.
