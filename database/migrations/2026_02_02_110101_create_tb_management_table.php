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
        Schema::create('tb_management', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('emailid')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twt_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->text('description')->nullable();
            $table->string('profile_img')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 = Active, 0 = Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_management');
    }
};
