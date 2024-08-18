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
        Schema::create('previous_case_details', function (Blueprint $table) {
            $table->id();
            $table->string('criminal_case_no')->nullable();
            $table->string('offense_charge')->nullable();
            $table->string('judge')->nullable();
            $table->string('court_branch')->nullable();
            $table->date('date_filed')->nullable();
            $table->foreignId('inmate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('previous_case_details');
    }
};
