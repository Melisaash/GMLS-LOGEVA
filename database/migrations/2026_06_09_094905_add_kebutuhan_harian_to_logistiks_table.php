<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('logistiks', function (Blueprint $table) {

            $table->decimal('kebutuhan_harian', 10, 2)
                  ->nullable()
                  ->after('satuan');

        });
    }

    public function down(): void
    {
        Schema::table('logistiks', function (Blueprint $table) {

            $table->dropColumn('kebutuhan_harian');

        });
    }
};