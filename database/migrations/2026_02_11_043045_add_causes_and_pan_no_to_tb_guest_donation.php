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
        Schema::table('tb_guest_donation', function (Blueprint $table) {
            $table->string('causes')->nullable()->after('status');
            $table->string('pan_no')->nullable()->after('causes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_guest_donation', function (Blueprint $table) {
            $table->dropColumn(['causes', 'pan_no']);
        });
    }
};
