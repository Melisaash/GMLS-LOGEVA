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
        Schema::create('sphere_pengungsis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_pengungsi_id')->constrained()->cascadeOnDelete();
            $table->integer('air_hidup');
            $table->integer('air_kebersihan');
            $table->integer('air_memasak');
            $table->integer('toilet_pendek');
            $table->integer('toilet_panjang');
            $table->integer('kalori');
            $table->integer('protein');
            $table->integer('lemak');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sphere_pengungsis');
    }
};
