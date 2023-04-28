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
        Schema::create('course_placements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('student_id');
            $table->string('english_placement')->nullable();
            $table->string('math_placement')->nullable();
            $table->boolean('reserve_math_challenge')->nullable();
            $table->string('language1')->nullable();
            $table->string('language2')->nullable();
            $table->string('language3')->nullable();
            $table->string('language4')->nullable();
            $table->boolean('reserve_language_challenge');
            $table->string('language_challenge')->nullable();
            $table->string('language_levels', 2048)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_placements');
    }
};
