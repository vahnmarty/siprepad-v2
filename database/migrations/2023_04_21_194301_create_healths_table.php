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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('medical_insurance_company');
            $table->string('medical_policy_number');
            $table->string('physician_name');
            $table->string('physician_phone');
            $table->string('prescribed_medications', 2048)->default('N/A')->nullable();
            $table->string('allergies', 2048)->default('N/A')->nullable();
            $table->string('other_issues', 2048)->default('N/A')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};
