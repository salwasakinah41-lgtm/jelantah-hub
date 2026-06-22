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
    Schema::create('setorans', function (Blueprint $table) {
        $table->id();
        
        // Relasi ke tabel users (siapa warga yang menyetor & siapa pengepulnya)
        $table->foreignId('masyarakat_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('pengepul_id')->constrained('users')->onDelete('cascade');
        
        // Input Awal dari Sisi Masyarakat/Warga
        $table->decimal('liter_estimasi', 8, 2);
        $table->date('tanggal_penjemputan');
        
        // Status Alur Berkas (Sesuai Studi Kasus)
        $table->enum('status', ['pending', 'dijemput', 'selesai', 'ditolak'])->default('pending');
        
        // Validasi Akhir dari Sisi Pengepul (Awalnya di-set kosong / nullable)
        $table->decimal('liter_bersih', 8, 2)->nullable();
        $table->decimal('endapan', 8, 2)->nullable();
        $table->integer('harga_dibayar')->nullable(); // Rumus: liter_bersih x harga_per_liter pengepul

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setorans');
    }
};
