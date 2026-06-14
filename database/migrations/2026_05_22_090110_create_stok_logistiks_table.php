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
        Schema::create('stok_logistiks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('lokasi_id')
                ->constrained('lokasis')
                ->cascadeOnDelete();

            $table->foreignId('logistik_id')
                ->constrained('logistiks')
                ->cascadeOnDelete();

            $table->integer('jumlah_stok')->default(0);

            $table->enum('status_ketersediaan', [
                'Hijau',
                'Kuning',
                'Merah'
            ])->default('Merah');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_logistiks');
    }
};
