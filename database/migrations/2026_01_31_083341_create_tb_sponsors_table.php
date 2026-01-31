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
        Schema::create('tb_sponsors', function (Blueprint $table) {
            $table->id(); // id BIGINT AUTO_INCREMENT PRIMARY
            $table->string('name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('state', 100);
            $table->string('city', 100);
            $table->string('zipcode', 60);
            $table->text('description');
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->enum('sponsor_type', ['gold', 'silver', 'bronze'])->default('bronze');
            $table->timestamps(); // created_at, updated_at
            $table->integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sponsors');
    }
};
