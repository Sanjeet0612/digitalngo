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
        Schema::create('tb_banner', function (Blueprint $table) {
            $table->id();
            $table->string('video_link')->nullable();
            $table->string('image_link'); // banner image path
            $table->string('redirect_link')->nullable(); // optional redirect link
            $table->tinyInteger('status')->default(1); // 1=active, 0=inactive
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_banner');
    }
};
