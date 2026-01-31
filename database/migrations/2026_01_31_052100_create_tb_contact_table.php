<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_contact', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('emailid')->nullable();
            $table->string('workingDays')->default('Mon-Sat');
            $table->string('officeTime')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('behance_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('copyright')->nullable();
            $table->string('created_by')->nullable();
            $table->string('created_by_url')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_contact');
    }
};
