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
        Schema::create('tb_causes_donation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('causes_id');
            $table->decimal('donation_amt', 10, 2);
            $table->string('name', 150);
            $table->string('email', 150)->nullable();
            $table->string('phone', 20);
            $table->string('utr_number', 100)->nullable();
            $table->string('screenshot')->nullable();
            $table->date('donation_date');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->foreign('causes_id')->references('id')->on('tb_causes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_causes_donation');
    }
};
