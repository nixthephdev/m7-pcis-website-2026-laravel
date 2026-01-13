<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            // Student Info
            $table->string('applicant_type')->default('New');
            $table->string('lrn')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_country')->nullable();
            $table->string('city_of_birth')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('primary_language')->nullable();
            $table->string('secondary_language')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            
            // Address
            $table->string('house_no')->nullable();
            $table->string('village')->nullable();
            $table->string('barangay')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->default('Philippines');
            $table->string('telephone')->nullable();
            
            // Family
            $table->string('birth_order')->nullable();
            $table->string('parents_marital_status')->nullable();
            
            // JSON Data Fields (Matches your Controller)
            $table->json('father_data')->nullable(); 
            $table->json('mother_data')->nullable(); 
            $table->json('guardian_data')->nullable(); 
            $table->json('siblings_data')->nullable(); 
            $table->json('academic_history')->nullable(); 
            
            // Health & Extra
            $table->text('health_conditions')->nullable();
            $table->boolean('has_allergies')->default(false);
            $table->text('disciplinary_history')->nullable();
            $table->text('special_needs')->nullable();
            $table->string('referral_source')->nullable();
        });
    }

    public function down(): void
    {
        // Drop columns if we roll back
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn([
                'applicant_type', 'lrn', 'middle_name', 'nickname', 'gender', 'birth_date',
                'birth_country', 'city_of_birth', 'religion', 'citizenship', 'primary_language',
                'secondary_language', 'height', 'weight', 'house_no', 'village', 'barangay',
                'city', 'province', 'zip_code', 'country', 'telephone', 'birth_order',
                'parents_marital_status', 'father_data', 'mother_data', 'guardian_data',
                'siblings_data', 'academic_history', 'health_conditions', 'has_allergies',
                'disciplinary_history', 'special_needs', 'referral_source'
            ]);
        });
    }
};