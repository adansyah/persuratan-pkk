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
        Schema::create('surat-masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('no_surat');
            $table->string('nama_surat');
            $table->date('tgl_surat');
            $table->date('tgl_diterima');
            $table->string('asal');
            $table->string('perihal');
            $table->string('file');
            $table->enum('status', ['proses', 'dibatalkan', 'diterima'])->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat-masuks');
    }
};
