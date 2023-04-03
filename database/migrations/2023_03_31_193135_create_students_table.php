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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('photo')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('preferred_first_name')->nullable();
            $table->date('birthdate');
            $table->string('gender');
            $table->string('personal_email');
            $table->string('mobile_phone');
            $table->string('race')->nullable();
            $table->string('ethnicity')->nullable();


            $table->string('current_school');
            $table->string('other_school')->nullable();

            $table->string('shirt_size')->nullable();
            $table->boolean('performing_arts')->nullable();
            $table->string('performing_arts_type')->nullable();
            $table->string('performing_arts_other')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
