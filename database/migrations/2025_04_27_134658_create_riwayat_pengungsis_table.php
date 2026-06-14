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
        Schema::create('riwayat_pengungsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lokasi_id')->constrained()->cascadeOnDelete();
            $table->integer('total_pengungsi');
            $table->integer('total_pria');
            $table->integer('total_wanita');
            $table->integer('dewasa');
            $table->integer('lansia');
            $table->integer('anak');
            $table->integer('remaja');
            $table->integer('ibu_menyusui');
            $table->integer('balita');
            $table->integer('disabilitas');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pengungsis');
    }
};
