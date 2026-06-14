<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('pengungsis', function ($table) {
        $table->date('tanggal_lahir')->nullable();
    });
}

public function down()
{
    Schema::table('pengungsis', function ($table) {
        $table->dropColumn('tanggal_lahir');
    });
}
};
