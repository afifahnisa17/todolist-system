# 📌 Task Management App (Laravel)

Ringkas: aplikasi web sederhana untuk mengelola tugas harian (CRUD tasks, dashboard, autentikasi). Dibangun dengan Laravel dan Blade, menggunakan Tabler untuk tampilan.

---

## Prasyarat
- PHP 8.1+
- Composer
- Node.js & npm
- MySQL / MariaDB

---

## Quick start (local)

1. Clone repository

```bash
git clone https://github.com/yourusername/task-management.git
cd todolist-system/todolist-web
```

2. Install dependencies

```bash
composer install
npm install
```

3. Copy file env dan atur konfigurasi database

```bash
cp .env.example .env
# edit .env lalu set DB_DATABASE, DB_USERNAME, DB_PASSWORD
php artisan key:generate
```

4. Migrasi database (opsional: seed jika ada)

```bash
php artisan migrate
php artisan db:seed
```

5. Build asset (development)

```bash
npm run dev
```

6. Jalankan server lokal

```bash
php artisan serve
```

Buka http://localhost:8000

---

## Struktur penting
- `resources/views/` — Blade views (layout/core pages)
- `app/Http/Controllers/` — Controller
- `routes/web.php` — Route web
- `database/migrations/` — Schema migrations

---

## Styling & UI
Proyek menggunakan Tabler (CDN) untuk komponen UI pada layout utama.

---

## Testing

```bash
php artisan test
```

---

