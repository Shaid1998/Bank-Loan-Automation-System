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
        Schema::create('regreqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('req_user_id');
            $table->string('req_full_name');
            $table->string('req_username')->unique();
            $table->string('req_email')->unique();
            $table->string('req_password');
            $table->string('req_phone');
            $table->string('req_address');
            $table->string('req_branch')->nullable();
            $table->string('req_photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regreqs');
    }
};
