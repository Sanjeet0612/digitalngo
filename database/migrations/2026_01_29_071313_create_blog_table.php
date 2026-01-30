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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // id bigint auto_increment
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete(); // linked to users table
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->string('author', 150);
            $table->string('category', 255)->index();
            $table->string('tags', 100)->index();
            $table->longText('description'); // longblob -> better longText for text content
            $table->string('bgimage', 255)->nullable();
            $table->string('authimage', 255)->nullable();
            $table->boolean('is_verified')->default(0);
            $table->enum('status', ['draft','published','archived'])->default('draft');
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
