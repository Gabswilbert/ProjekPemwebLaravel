# Penyelesaian Error Database - Kategori "Tambah" Button

## 🔴 Masalah yang Ditemukan
Ketika mengklik tombol "Tambah" di halaman kategori untuk menambahkan produk ke keranjang, terjadi error:
```
SQLSTATE[42S22]: Column not found: 1054 Unknown column 'product_name' in 'field list'
```

## ✅ Penyebab
Kolom `product_name`, `store_name` tidak ada di tabel `carts` di database MySQL.

---

## 🔧 Cara Memperbaiki

### Metode 1: Menggunakan Laravel Migration (Recommended)

**Step 1: Pastikan MySQL berjalan**
- Buka XAMPP Control Panel
- Klik "Start" pada MySQL module

**Step 2: Jalankan migration**
```bash
cd C:\xampp\htdocs\ProjekPemwebLaravel
php artisan migrate
```

Jika berhasil, Anda akan melihat output:
```
Migrating: 2026_05_18_000000_add_missing_columns_to_carts_table
Migrated:  2026_05_18_000000_add_missing_columns_to_carts_table
```

---

### Metode 2: Menggunakan phpMyAdmin (Jika Migration Gagal)

**Step 1: Buka phpMyAdmin**
- Buka browser dan akses `http://localhost/phpmyadmin`

**Step 2: Pilih database `laravel`**
- Click pada database `laravel` di sidebar

**Step 3: Buka tabel `carts`**
- Klik pada tabel `carts`
- Pilih tab "Structure"

**Step 4: Tambahkan kolom yang hilang**
Klik "Add" dan buat kolom baru:
1. **Kolom 1:**
   - Name: `product_name`
   - Type: `VARCHAR(255)`
   - Null: `Yes`
   - After: `product_id`

2. **Kolom 2:**
   - Name: `store_name`  
   - Type: `VARCHAR(255)`
   - Null: `Yes`
   - After: `quantity`

---

### Metode 3: Menggunakan SQL Script Langsung

**Step 1: Buka phpMyAdmin**

**Step 2: Pilih database `laravel`**

**Step 3: Buka tab "SQL"**

**Step 4: Copy-paste query ini:**
```sql
ALTER TABLE carts ADD COLUMN product_name VARCHAR(255) NULL AFTER product_id;
ALTER TABLE carts ADD COLUMN store_name VARCHAR(255) NULL AFTER quantity;
```

**Step 5: Klik "Go"**

---

## 📋 File yang Sudah Dimodifikasi

1. **Migration Baru (Otomatis menambah kolom):**
   - `database/migrations/2026_05_18_000000_add_missing_columns_to_carts_table.php`

2. **Controller yang Diperbaiki:**
   - `app/Http/Controllers/CartsController.php` 
   - Sekarang lebih fleksibel dan robust dalam menangani kolom optional

3. **SQL Script Manual (Backup):**
   - `database/fix_carts_table.sql`

---

## ✨ Testing Setelah Perbaikan

Setelah migration atau SQL berhasil:

1. **Buka halaman kategori:** `http://localhost/ProjekPemwebLaravel/public/kategori`
2. **Klik tombol "Tambah"** pada salah satu produk
3. **Masukkan jumlah** dan klik "Tambah"
4. **Produk seharusnya ditambahkan ke keranjang** tanpa error

---

## 🆘 Jika Masih Ada Masalah

Hubungi saya dengan informasi:
- Output dari terminal saat menjalankan `php artisan migrate`
- Screenshot error yang muncul
- Status MySQL di XAMPP Control Panel

