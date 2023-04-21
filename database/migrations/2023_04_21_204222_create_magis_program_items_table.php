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
        Schema::create('magis_program_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('magis_program_id');
            $table->unsignedBigInteger('student_id');
            $table->boolean('is_interested');
            $table->timestamps();

            $table->foreign('magis_program_id')->references('id')->on('magis_programs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('magis_program_items');
    }
};
