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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_distribution_id')->unique();
            $table->string('user_id');
            $table->string('plan_id');
            $table->string('plan_type');
            $table->string('plan_interest_rate');
            $table->string('plan_emi');
            $table->string('plan_branch')->nullable();
            $table->string('distribution_branch')->nullable();
            $table->string('loan_amount');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->text('user_address');
            $table->text('user_commitment');
            $table->string('user_branch');
            $table->string('issued_by');
            $table->string('issue_date');
            $table->string('expire_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
