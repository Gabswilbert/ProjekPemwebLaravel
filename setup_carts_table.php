<?php
/**
 * Script untuk setup tabel carts di database laravel
 * Run: php setup_carts_table.php
 */

// Connect to database
$conn = new mysqli('127.0.0.1', 'root', '', 'laravel');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

echo "📦 Membuat tabel carts...\n";

// Drop tabel lama jika ada
$conn->query('DROP TABLE IF EXISTS carts');
echo "✓ Tabel lama dihapus\n";

// Buat tabel baru
$sql = "CREATE TABLE carts (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

if ($conn->query($sql) === TRUE) {
    echo "✅ Tabel carts berhasil dibuat dengan struktur yang benar!\n";
    echo "\nKolom yang tersedia:\n";
    echo "  • id (Primary Key)\n";
    echo "  • user_id (Foreign Key)\n";
    echo "  • product_name\n";
    echo "  • product_id\n";
    echo "  • price\n";
    echo "  • quantity\n";
    echo "  • store_name\n";
    echo "  • created_at\n";
    echo "  • updated_at\n";
} else {
    echo "❌ Error: " . $conn->error . "\n";
}

$conn->close();
?>
