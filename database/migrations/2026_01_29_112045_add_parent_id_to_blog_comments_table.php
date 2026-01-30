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
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->foreignId('parent_id')->nullable()->constrained('blog_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
};
