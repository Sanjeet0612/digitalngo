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
        Schema::table('tb_gallery_category', function (Blueprint $table) {
            $table->string('cat_name')->after('id');
            // agar nullable chahiye ho:
            // $table->string('cat_name')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_gallery_category', function (Blueprint $table) {
            $table->dropColumn('cat_name');
        });
    }
};
