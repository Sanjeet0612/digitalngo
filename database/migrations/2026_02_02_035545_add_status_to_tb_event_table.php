<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tb_event', function (Blueprint $table) {
            $table->tinyInteger('status')
                ->default(1)
                ->comment('1 = Active, 0 = Inactive')
                ->after('id'); // agar kisi specific column ke baad chahiye
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tb_event', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
