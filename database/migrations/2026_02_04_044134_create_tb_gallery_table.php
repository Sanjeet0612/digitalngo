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
        Schema::create('tb_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->enum('gtype', ['photo', 'video']);
            $table->string('path');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            // optional foreign key
            $table->foreign('cat_id')->references('id')->on('tb_gallery_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_gallery');
    }
};
