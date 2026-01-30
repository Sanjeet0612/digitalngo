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
        Schema::create('tb_event', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Event title
            $table->text('description')->nullable(); // Event description
            $table->date('start_date'); // Event start date
            $table->date('end_date')->nullable(); // Event end date
            $table->string('location')->nullable(); // Event location
            $table->unsignedBigInteger('user_id'); // Creator / owner of event
            $table->string('banner')->nullable(); // Event banner image
            $table->timestamps();

            // Foreign key to users table
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
        Schema::dropIfExists('tb_event');
    }
};
