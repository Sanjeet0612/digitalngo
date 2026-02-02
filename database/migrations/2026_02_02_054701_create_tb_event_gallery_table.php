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
        Schema::create('tb_event_gallery', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('event_id'); // foreign key to tb_event
            $table->string('image'); // image path
            $table->integer('position')->default(0); // optional sort order
            $table->tinyInteger('status')->default(1)->comment('1 = Active, 0 = Inactive');
            $table->timestamps();

            // foreign key constraint
            $table->foreign('event_id')->references('id')->on('tb_event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_event_gallery');
    }
};
