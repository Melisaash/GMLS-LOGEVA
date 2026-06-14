<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengungsis', function (Blueprint $table) {

            $table->id();

            // Relasi ke lokasi TEA
            $table->foreignId('lokasi_id')
                  ->constrained('lokasis')
                  ->onDelete('cascade');

            $table->string('foto')->nullable();

            $table->string('nama');

            $table->string('asal');

            $table->integer('usia');

            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ]);

            $table->string('kondisi_kesehatan');

            $table->enum('kelompok_rentan', [
                'Tidak',
                'Ibu Hamil',
                'Lansia',
                'Bayi',
                'Disabilitas',
                'Sakit'
            ])->default('Tidak');

            $table->text('riwayat_penyakit')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengungsis');
    }
};