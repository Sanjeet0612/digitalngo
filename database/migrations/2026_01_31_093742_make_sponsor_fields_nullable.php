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
        Schema::table('tb_sponsors', function (Blueprint $table) {
            $table->string('address')->nullable()->change();
            $table->string('state', 100)->nullable()->change();
            $table->string('city', 100)->nullable()->change();
            $table->string('zipcode', 60)->nullable()->change();
            $table->text('description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_sponsors', function (Blueprint $table) {
            $table->string('address')->nullable(false)->change();
            $table->string('state', 100)->nullable(false)->change();
            $table->string('city', 100)->nullable(false)->change();
            $table->string('zipcode', 60)->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
        });
    }
};
