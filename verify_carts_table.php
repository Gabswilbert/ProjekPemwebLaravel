<?php
/**
 * Script untuk verify tabel carts dan struktur
 */

$conn = new mysqli('127.0.0.1', 'root', '', 'laravel');

if ($conn->connect_error) {
    die('❌ Connection failed: ' . $conn->connect_error);
}

echo "========================================\n";
echo "  VERIFIKASI TABEL CARTS\n";
echo "========================================\n\n";

// Check if table exists
$result = $conn->query("DESCRIBE carts");

if ($result) {
    echo "✅ Tabel carts sudah ada!\n\n";
    echo "Struktur kolom:\n";
    echo "─────────────────────────────────────────\n";
    
    while ($row = $result->fetch_assoc()) {
        printf("%-20s | %-20s | %s\n", 
            $row['Field'], 
            $row['Type'],
            ($row['Null'] == 'YES' ? 'NULLABLE' : 'NOT NULL')
        );
    }
    
    echo "─────────────────────────────────────────\n\n";
    
    // Check row count
    $countResult = $conn->query("SELECT COUNT(*) as total FROM carts");
    $countRow = $countResult->fetch_assoc();
    
    echo "📊 Total data di tabel: " . $countRow['total'] . " baris\n";
    
    echo "\n✅ Tabel siap digunakan!\n";
    echo "\nSetiap klik tombol 'Tambah' di halaman kategori akan:\n";
    echo "  1. Mengirim POST request ke /cart/add\n";
    echo "  2. CartsController->addToCart() memproses data\n";
    echo "  3. Data diinsert ke tabel carts\n";
    echo "  4. User diarahkan ke halaman /keranjang\n";
    
} else {
    echo "❌ Tabel carts tidak ditemukan!\n";
    echo "Error: " . $conn->error . "\n";
}

$conn->close();
?>
