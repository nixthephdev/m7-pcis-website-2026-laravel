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
    Schema::table('enrollments', function (Blueprint $table) {
        // Step 2: Student Info (Extended)
        $table->string('nickname')->nullable();
        $table->string('birth_country')->nullable();
        $table->string('city_of_birth')->nullable();
        $table->string('citizenship')->nullable();
        $table->string('primary_language')->nullable();
        $table->string('secondary_language')->nullable();
        $table->decimal('height', 5, 2)->nullable(); // cm
        $table->decimal('weight', 5, 2)->nullable(); // kg
        
        // Step 3: Address & Contact (Specifics)
        $table->string('house_no')->nullable();
        $table->string('village')->nullable();
        $table->string('barangay')->nullable();
        $table->string('city')->nullable();
        $table->string('province')->nullable();
        $table->string('zip_code')->nullable();
        $table->string('telephone')->nullable();
        
        // Step 4-6: Detailed Parent/Guardian Info
        // We will use JSON columns to store the massive amount of parent data 
        // (Education, Occupation, Company, Alumni Status, etc.) cleanly.
        // This prevents creating 50+ new columns.
        $table->json('father_data')->nullable(); 
        $table->json('mother_data')->nullable(); 
        $table->json('guardian_data')->nullable(); 

        // Step 7 & 10: Dynamic Lists
        $table->json('siblings_data')->nullable(); // List of siblings
        $table->json('academic_history')->nullable(); // List of previous schools
        
        // Step 9: Additional Info
        $table->text('disciplinary_history')->nullable();
        $table->text('special_needs')->nullable();
        $table->string('referral_source')->nullable();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
