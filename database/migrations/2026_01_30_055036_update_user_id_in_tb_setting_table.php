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
        Schema::table('tb_setting', function (Blueprint $table) {

            // Agar pehle nullable tha, change to NOT NULL
            $table->unsignedBigInteger('user_id')->nullable(false)->change();

            // Add foreign key (pehle foreign key nahi tha)
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_setting', function (Blueprint $table) {

            // Drop foreign key
            $table->dropForeign(['user_id']);

            // Optional: make nullable again
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });
    }
};
