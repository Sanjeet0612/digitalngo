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
            $table->string('address')->nullable()->after('location');
            $table->string('city')->nullable()->after('address');
            $table->string('state')->nullable()->after('city');
            $table->string('zipcode', 20)->nullable()->after('state');
            $table->time('e_time')->nullable()->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tb_event', function (Blueprint $table) {
            $table->dropColumn([
                'address',
                'city',
                'state',
                'zipcode',
                'e_time',
            ]);
        });
    }
};
