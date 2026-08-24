#  Day Dream Donuts & Coffee - Web & Admin Panel

Aplikasi web pemesanan dan sistem manajemen pesanan berbasis **Laravel** untuk **Day Dream Donuts & Coffee**. Dilengkapi antarmuka pemesanan untuk pelanggan dan panel admin terintegrasi untuk mengelola transaksi, katalog menu, serta data pengguna.

**Link Demo:** https://daydream-coffee-donuts-production.up.railway.app/
---

## Fitur Utama

* **Customer Web:** Katalog donat & kopi, form pemesanan online langsung masuk database, dan tampilan responsif.
* **Admin Panel:** Manajemen pesanan dengan tabel interaktif (**DataTables**), kontrol status pesanan (*Pending*, *Diproses*, *Selesai*, *Dibatalkan*), serta CRUD data produk dan akun pengguna.

---

##  Tech Stack

* **Backend:** PHP, Laravel
* **Frontend:** Blade, Bootstrap 5, Bootstrap Icons, DataTables (jQuery)
* **Database:** MySQL / SQLite
* **Tools:** Composer, NPM, Git

---

##  Quick Start (Instalasi Lokal)

```bash
# 1. Clone repo & masuk folder
git clone [https://github.com/eko-hrn/daydream-coffee-donuts.git](https://github.com/eko-hrn/daydream-coffee-donuts.git)
cd daydream-coffee-donuts

# 2. Install dependencies
composer install
npm install

# 3. Environment & App Key
cp .env.example .env
php artisan key:generate
php artisan storage:link

# 4. Migrate & Seed Database
php artisan migrate --seed

# 5. Jalankan project
php artisan serve
npm run dev
