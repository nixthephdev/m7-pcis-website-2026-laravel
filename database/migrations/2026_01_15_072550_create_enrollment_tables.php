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
    // database/migrations/xxxx_create_enrollment_tables.php

public function up()
{
    // 1. Main Enrollment/Student Table
    Schema::create('enrollments', function (Blueprint $table) {
        $table->id();
        $table->string('reference_no')->unique(); // For tracking
        $table->string('status')->default('draft'); // draft, submitted, under_review, accepted, rejected
        
        // Step 1: Application Type
        $table->string('applicant_type'); // New, Returnee, Transferee
        $table->boolean('is_local')->default(true); // Located in PH?

        // Step 2: Student Info
        $table->string('lrn')->nullable();
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('nickname')->nullable();
        $table->string('gender');
        $table->date('birth_date');
        $table->string('birth_country');
        $table->string('birth_city');
        $table->string('religion')->nullable();
        $table->string('citizenship');
        $table->string('primary_language')->nullable();
        $table->string('secondary_language')->nullable();
        $table->decimal('height_cm', 5, 2)->nullable();
        $table->decimal('weight_kg', 5, 2)->nullable();

        // Step 3: Address & Contact
        $table->text('home_address'); // Combine fields or split: country, province, city, barangay, street, zip
        $table->string('telephone')->nullable();
        $table->string('mobile');

        // Step 4: Family Background General
        $table->string('birth_order'); // Eldest, Middle, etc.
        $table->string('parents_marital_status');
        $table->string('authorized_guardian'); // Who claims reports?

        // Step 5 & 6: Parents (We store as JSON to save table space, or separate cols)
        $table->json('father_details')->nullable(); // Name, religion, citizenship, work, alumni status
        $table->json('mother_details')->nullable(); // Name, religion, citizenship, work, alumni status
        $table->json('guardian_details')->nullable();

        // Step 8: Health
        $table->text('health_allergies')->nullable();
        $table->text('health_conditions')->nullable();
        $table->string('health_hearing')->nullable();
        $table->string('health_eyesight')->nullable();

        // Step 9: Additional Info
        $table->text('disciplinary_history')->nullable();
        $table->text('special_needs_info')->nullable();
        $table->string('referral_source')->nullable();

        $table->timestamps();
    });

    // 2. Siblings Table (One-to-Many)
    Schema::create('siblings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('enrollment_id')->constrained()->cascadeOnDelete();
        $table->string('name');
        $table->string('school_or_work')->nullable();
        $table->string('grade_or_year')->nullable();
        $table->year('graduated_year')->nullable(); // If alumni
        $table->timestamps();
    });

    // 3. Academic History (One-to-Many)
    Schema::create('academic_histories', function (Blueprint $table) {
        $table->id();
        $table->foreignId('enrollment_id')->constrained()->cascadeOnDelete();
        $table->string('school_name');
        $table->string('school_year'); // e.g., 2024-2025
        $table->string('grade_level');
        $table->string('awards')->nullable();
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
        Schema::dropIfExists('enrollment_tables');
    }
};
