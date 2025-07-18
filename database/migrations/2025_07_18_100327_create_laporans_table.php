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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('jenis_surat', ['masuk', 'keluar']); // untuk menandai jenis surat
            $table->unsignedBigInteger('surat_masuk_id')->nullable();
            $table->unsignedBigInteger('surat_keluar_id')->nullable();

            $table->date('tanggal_laporan'); // untuk filter laporan berdasarkan tanggal
            $table->text('keterangan')->nullable(); // deskripsi atau catatan tambahan
            $table->timestamps();

            // Relasi opsional
            $table->foreign('surat_masuk_id')->references('id')->on('surat-masuks')->onDelete('set null');
            $table->foreign('surat_keluar_id')->references('id')->on('surat-keluars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
