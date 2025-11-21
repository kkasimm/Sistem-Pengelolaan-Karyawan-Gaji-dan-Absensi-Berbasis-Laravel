<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_kehadirans', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('kategori_kehadiran'); // Hadir, Izin, Sakit, Alfa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_kehadirans');
    }
};