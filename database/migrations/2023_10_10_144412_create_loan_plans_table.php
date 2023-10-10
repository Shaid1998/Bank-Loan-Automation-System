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
        Schema::create('loan_plans', function (Blueprint $table) {
            $table->id();
            $table->string('Loan_id')->unique();
            $table->string('Loan_type')->nullable();
            $table->string('branch_name')->nullable();
            $table->enum('loan_duration',['monthly','yearly','multiyearly'])->default('yearly');
            $table->text('loan_description')->nullable();
            $table->enum('emi',['yes','no'])->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_plans');
    }
};
