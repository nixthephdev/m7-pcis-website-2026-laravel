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
        // Step 1: Type
        $table->string('applicant_type')->default('New'); // New, Returnee, Transferee
        
        // Step 2: Student Info
        $table->string('lrn')->nullable();
        $table->string('middle_name')->nullable();
        $table->string('nickname')->nullable();
        $table->string('gender')->nullable();
        $table->date('birth_date')->nullable();
        $table->string('birth_place')->nullable();
        $table->string('religion')->nullable();
        $table->string('citizenship')->nullable();
        $table->string('primary_language')->nullable();
        
        // Step 3: Address
        $table->string('address_street')->nullable();
        $table->string('address_barangay')->nullable();
        $table->string('address_city')->nullable();
        $table->string('address_province')->nullable();
        $table->string('zip_code')->nullable();
        
        // Step 4: Family Background
        $table->string('birth_order')->nullable(); // Eldest, Middle, Youngest
        $table->string('parents_marital_status')->nullable();
        
        // Step 5 & 6: Parents (JSON is easier for grouped data in simple apps)
        $table->json('father_details')->nullable(); // Name, contact, occupation
        $table->json('mother_details')->nullable(); // Name, contact, occupation
        $table->json('guardian_details')->nullable();
        
        // Step 7: History
        $table->json('siblings')->nullable();
        $table->string('previous_school_name')->nullable();
        $table->string('previous_school_address')->nullable();
        
        // Step 8: Health
        $table->text('health_conditions')->nullable();
        $table->boolean('has_allergies')->default(false);
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            //
        });
    }
};
