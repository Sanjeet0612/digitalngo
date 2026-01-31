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
        Schema::table('tb_event', function (Blueprint $table) {
            $table->string('og_name')->nullable()->after('title');
            $table->string('og_email')->nullable()->after('og_name');
            $table->string('og_phone')->nullable()->after('og_email');
            $table->string('og_weblink')->nullable()->after('og_phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tb_event', function (Blueprint $table) {
            $table->dropColumn([
                'og_name',
                'og_email',
                'og_phone',
                'og_weblink'
            ]);
        });
    }
};
