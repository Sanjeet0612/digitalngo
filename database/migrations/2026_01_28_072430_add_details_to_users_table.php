<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('email');
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->enum('gender', ['male','female','other'])->nullable()->after('phone');
            }
            if (!Schema::hasColumn('users', 'address')) {
                $table->string('address')->nullable()->after('gender');
            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'state')) {
                $table->string('state')->nullable()->after('city');
            }
            if (!Schema::hasColumn('users', 'pan_num')) {
                $table->string('pan_num')->nullable()->after('state');
            }
            if (!Schema::hasColumn('users', 'pan_img')) {
                $table->string('pan_img')->nullable()->after('pan_num');
            }
            if (!Schema::hasColumn('users', 'adhar_num')) {
                $table->string('adhar_num')->nullable()->after('pan_img');
            }
            if (!Schema::hasColumn('users', 'adhar_img')) {
                $table->string('adhar_img')->nullable()->after('adhar_num');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $columns = [
                'phone','gender','address','city','state',
                'pan_num','pan_img','adhar_num','adhar_img'
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};