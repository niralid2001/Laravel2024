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
        Schema::create('educational_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('program',50)->nullable();
            $table->string('batch',50)->nullable();
            $table->integer('passing_year')->nullable();
            $table->string('university',30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_details');
    }
};
