## _Website Gambir_siguntur_

[![N|Solid](https://cldup.com/dTxpPi9lDf.thumb.png)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Gambir Asli adalah platform berbasis web yang responsif, terhubung dengan database, dan dirancang khusus untuk menampilkan produk unggulan Gambir Siguntur secara interaktif.

- Tulis Testimoni – Bagikan pengalamanmu di form yang tersedia.

- Update Otomatis – Lihat pesanmu muncul seketika di daftar testimoni.

- Desain Modern-Vintage – Antarmuka elegan dengan sentuhan warna alam.

- ✨ Full Stack ✨

## Features

- Database Driven: Menggunakan MySQL untuk menyimpan dan memanggil data testimoni secara dinamis.
- Smart Profile: Pembuatan inisial nama otomatis menggunakan logika PHP.
- Clean UI: Dibangun dengan Bootstrap 5 dan Google Fonts (Poppins & Merriweather).
- Responsive Scrolling: Kotak testimoni dengan custom scrollbar yang tetap rapi di semua ukuran layar.
- Backend Optimized: Proses pengiriman data yang cepat dan aman menggunakan PHP.

## Tech

Website Gambir Asli dibangun menggunakan kombinasi teknologi modern dan handal untuk memastikan performa yang cepat dan pengalaman pengguna yang interaktif:

- PHP (Hypertext Preprocessor) – Bahasa pemrograman utama untuk logika backend, pemrosesan form, dan pengambilan data dinamis.

- MySQL – Sistem manajemen database untuk menyimpan testimoni pelanggan dan konten produk secara aman.

- Bootstrap 5 – Framework CSS paling populer untuk memastikan desain website yang responsif dan mobile-ready.

- Google Fonts – Menggunakan font Poppins untuk kesan modern dan Merriweather untuk kesan vintage yang berwibawa.

- XAMPP – Lingkungan pengembangan lokal yang mengintegrasikan Apache server dan MySQL port 3307.

- Vanilla JavaScript – Digunakan untuk interaksi antarmuka pengguna yang ringan.

- HTML5 & CSS3 – Fondasi utama struktur halaman dan styling custom, termasuk efek glassmorphism pada kotak testimoni.

## Structure
gambir_siguntur/
├── assets/                  # Folder pusat semua aset tampilan
│   ├── css/
│   │   └── style.css        # Semua custom desain dan scrollbar
│   ├── fonts/               # Tempat menyimpan file font (jika offline)
│   ├── img/                 # Koleksi gambar produk dan background (daun1.png, dll)
│   └── js/                  # Script JavaScript tambahan
│
├── backend/                 # Folder pusat logika server
│   ├── config/              # File konfigurasi proses
│   │   └── proses_testimoni.php
│   ├── controllers/         # File pengatur data
│   │   └── koneksi.php      # Koneksi database (localhost:3307)
│   ├── models/              # (Opsional) Untuk struktur data database
│   └── routes/              # (Opsional) Untuk jalur navigasi backend
│
├── admin/                   # (Rencana) Folder khusus halaman pengelola
│
├── index.html               # Halaman Beranda
├── about.html               # Halaman Tentang Kami
├── products.html            # Halaman Daftar Produk
├── product-detail1.html     # Detail Produk 1
├── blog.html                # Halaman Daftar Artikel
├── blog-post1.html          # Isi Artikel 1
├── contact.html             # Halaman Kontak
└── testimoni.php            # Halaman Testimoni Dinamis (PHP)



## Installation

pindahkan folder kedalam website ke folder:

```
c:\xamp\htdocs
```
Akses dengan menggunakan url:

```sh
http://localhost/gambir_siguntur/index.html
```
## Credit
> Paldrianto 2026

[//]: # (These are reference links used in the body of this note and get stripped out when the markdown processor does its job. There is no need to format nicely because it shouldn't be seen. Thanks SO - http://stackoverflow.com/questions/4823468/store-comments-in-markdown-syntax)

   [dill]: <https://github.com/joemccann/dillinger>
   [git-repo-url]: <https://github.com/joemccann/dillinger.git>
   [john gruber]: <http://daringfireball.net>
   [df1]: <http://daringfireball.net/projects/markdown/>
   [markdown-it]: <https://github.com/markdown-it/markdown-it>
   [Ace Editor]: <http://ace.ajax.org>
   [node.js]: <http://nodejs.org>
   [Twitter Bootstrap]: <http://twitter.github.com/bootstrap/>
   [jQuery]: <http://jquery.com>
   [@tjholowaychuk]: <http://twitter.com/tjholowaychuk>
   [express]: <http://expressjs.com>
   [AngularJS]: <http://angularjs.org>
   [Gulp]: <http://gulpjs.com>

   [PlDb]: <https://github.com/joemccann/dillinger/tree/master/plugins/dropbox/README.md>
   [PlGh]: <https://github.com/joemccann/dillinger/tree/master/plugins/github/README.md>
   [PlGd]: <https://github.com/joemccann/dillinger/tree/master/plugins/googledrive/README.md>
   [PlOd]: <https://github.com/joemccann/dillinger/tree/master/plugins/onedrive/README.md>
   [PlMe]: <https://github.com/joemccann/dillinger/tree/master/plugins/medium/README.md>
   [PlGa]: <https://github.com/RahulHP/dillinger/blob/master/plugins/googleanalytics/README.md>
