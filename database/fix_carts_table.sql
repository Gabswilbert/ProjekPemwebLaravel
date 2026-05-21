-- Script SQL untuk memperbaiki tabel 'carts' di database laravel
-- Jalankan semua query di bawah ini di phpMyAdmin

-- SOLUSI 1: Jika tabel sudah ada - DROP dan buat ulang (PALING AMAN)
DROP TABLE IF EXISTS carts;

CREATE TABLE carts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    product_name VARCHAR(255) NULL,
    product_id INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    store_name VARCHAR(255) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_product_id (product_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- SOLUSI 2: Jika hanya ingin menambah kolom yang hilang
-- ALTER TABLE carts ADD COLUMN product_name VARCHAR(255) NULL AFTER product_id;
-- ALTER TABLE carts ADD COLUMN price DECIMAL(10, 2) NULL AFTER product_id;
-- ALTER TABLE carts ADD COLUMN store_name VARCHAR(255) NULL AFTER quantity;
