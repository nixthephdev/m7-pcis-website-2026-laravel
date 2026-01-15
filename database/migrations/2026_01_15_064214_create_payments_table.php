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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained()->onDelete('cascade'); // Links to student
            $table->string('transaction_id')->unique(); // e.g., TRX-1001
            $table->decimal('amount', 10, 2);
            $table->string('type'); // e.g., 'Application Fee', 'Tuition'
            $table->string('method'); // e.g., 'Bank Transfer', 'GCash', 'Cash'
            $table->string('status')->default('pending'); // pending, paid, rejected
            $table->string('proof_file')->nullable(); // Path to screenshot of receipt
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
        Schema::dropIfExists('payments');
    }
};
