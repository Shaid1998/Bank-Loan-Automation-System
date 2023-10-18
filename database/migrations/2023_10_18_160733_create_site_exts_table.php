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
        Schema::create('site_exts', function (Blueprint $table) {
            $table->id();
            $table->string('chose_title')->nullable();
            $table->text('chose_text')->nullable();
            $table->string('find_title')->nullable();
            $table->text('find_text')->nullable();
            $table->string('explore_title')->nullable();
            $table->text('explore_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_exts');
    }
};
