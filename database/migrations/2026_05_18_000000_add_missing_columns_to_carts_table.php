<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cek apakah tabel carts ada
        if (Schema::hasTable('carts')) {
            Schema::table('carts', function (Blueprint $table) {
                // Tambahkan kolom yang missing jika belum ada
                if (!Schema::hasColumn('carts', 'product_name')) {
                    $table->string('product_name')->nullable()->after('product_id');
                }
                if (!Schema::hasColumn('carts', 'store_name')) {
                    $table->string('store_name')->nullable()->after('quantity');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'product_name')) {
                $table->dropColumn('product_name');
            }
            if (Schema::hasColumn('carts', 'store_name')) {
                $table->dropColumn('store_name');
            }
        });
    }
};
