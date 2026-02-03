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
        Schema::table('tb_management', function (Blueprint $table) {
            //$table->string('team_type')->after('designation');
            // agar dropdown use karoge to enum bhi kar sakte ho
            $table->enum('team_type', ['management', 'governing','volunteer'])->nullable()->after('designation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_management', function (Blueprint $table) {
            if (Schema::hasColumn('tb_management', 'team_type')) {
                $table->dropColumn('team_type');
            }
        });
    }
};
