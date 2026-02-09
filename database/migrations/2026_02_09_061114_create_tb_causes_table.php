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
        Schema::create('tb_causes', function (Blueprint $table) {
            $table->id();
            // Foreign Key
            $table->foreignId('causes_cat_id')->constrained('tb_causes_category')->cascadeOnDelete();
            // Category snapshot name (optional but allowed)
            $table->string('couses_cat_name');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('phone', 20);
            $table->string('email');
            $table->decimal('tot_amt', 10, 2)->default(0.00);
            $table->decimal('received_amt', 10, 2)->default(0.00);
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_causes');
    }
};
