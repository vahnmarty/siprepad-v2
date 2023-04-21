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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('relationship');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('mobile_phone');
            $table->string('email');
            $table->string('alternate_email');
            $table->string('employer');
            $table->string('job_title');
            $table->string('work_phone')->nullable();
            $table->string('high_school_attended', 5000)->nullable();
            $table->string('living_situation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
