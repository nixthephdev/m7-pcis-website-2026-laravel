<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Enrollments Table (The Application)
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('reference_no')->unique()->nullable();
            $table->string('status')->default('pending');
            
            // Step 1: Type
            $table->string('applicant_type')->nullable();
            $table->string('is_local')->default('yes');
            $table->string('grade_level')->nullable();

            // Step 2: Student Personal Info
            $table->string('lrn')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('birth_city')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('primary_language')->nullable();
            $table->string('secondary_language')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();

            // Step 3: Home Address
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('subdivision')->nullable();
            $table->string('street')->nullable();
            $table->string('zip')->nullable();
            $table->text('address')->nullable(); 

            // Step 4: Contact & Family Background
            $table->string('telephone')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('birth_order')->nullable();
            $table->string('parents_marital_status')->nullable();
            $table->string('authorized_guardian')->nullable();

            // JSON DATA BLOCKS
            $table->json('father_details')->nullable(); 
            $table->json('mother_details')->nullable();
            $table->json('guardian_details')->nullable();
            $table->json('siblings_data')->nullable();
            $table->json('academic_history')->nullable(); 

            // Health & Additional
            $table->text('health_conditions')->nullable(); 
            $table->text('disciplinary_history')->nullable();
            $table->text('learning_difficulty')->nullable();
            $table->string('referral_source')->nullable();

            $table->timestamps();
        });

        // 2. Payments Table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('type');
            $table->string('method');
            $table->string('status')->default('pending');
            $table->string('proof_file')->nullable();
            $table->timestamps();
        });

        // 3. Leads Table
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('level');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('enrollments');
    }
};