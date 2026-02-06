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
        Schema::create('tb_guest_donation', function (Blueprint $table) {
            $table->id();

            $table->decimal('package_amt', 10, 2); // donation amount
            $table->string('name', 150);
            $table->string('phone', 20);
            $table->string('email', 150)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->text('address')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('refrer_code', 100)->nullable();

            $table->tinyInteger('status')->default(1); // 1=success/active, 0=pending/inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_guest_donation');
    }
};
