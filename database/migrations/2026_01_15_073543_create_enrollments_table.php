<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->unique()->nullable();
            $table->string('status')->default('pending'); // pending, accepted, rejected
            
            // Step 1: Type
            $table->string('applicant_type')->nullable(); // New, Returnee
            $table->boolean('is_local')->default(true);

            // Step 2: Student Info
            $table->string('lrn')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('grade_level')->nullable(); // Nursery, Kinder, Grade 1...

            // Contact
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();

            // Parents (JSON to store complex data easily)
            $table->json('father_details')->nullable();
            $table->json('mother_details')->nullable();
            $table->json('guardian_details')->nullable();

            // Background
            $table->text('health_conditions')->nullable();
            $table->json('siblings_data')->nullable();
            $table->json('academic_history')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
};
