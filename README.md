# Day Dream Donuts & Coffee - Web & Admin Panel

An online ordering web application and order management system built with **Laravel** for **Day Dream Donuts & Coffee**. It features a customer-facing interface for browsing and ordering, paired with an integrated admin dashboard to manage transactions, menu catalogs, and user accounts.

**Live Demo:** https://daydream-coffee-donuts-production.up.railway.app/

---

## Key Features

* **Customer Web:** Donut & coffee product catalog, direct online ordering form integrated with the database, and responsive mobile-friendly UI.
* **Admin Panel:** Order management powered by interactive data tables (**DataTables**), order status controls (*Pending*, *Processing*, *Completed*, *Cancelled*), and full CRUD operations for product items and admin users.

---

## Tech Stack

* **Backend:** PHP, Laravel
* **Frontend:** Blade, Bootstrap 5, Bootstrap Icons, DataTables (jQuery)
* **Database:** MySQL / SQLite
* **Tools:** Composer, NPM, Git

---

## Quick Start (Local Setup)

```bash
# 1. Clone repository & open project directory
git clone [https://github.com/eko-hrn/daydream-coffee-donuts.git](https://github.com/eko-hrn/daydream-coffee-donuts.git)
cd daydream-coffee-donuts

# 2. Install dependencies
composer install
npm install

# 3. Environment setup & application key
cp .env.example .env
php artisan key:generate
php artisan storage:link

# 4. Run migrations & database seeding
php artisan migrate --seed

# 5. Start development servers
php artisan serve
npm run dev
