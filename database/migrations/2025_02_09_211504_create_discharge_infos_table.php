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
        Schema::create('discharge_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inmate_id')->nullable();
            $table->string('criminal_case')->nullable();
            $table->string('class')->nullable();
            $table->string('committed_on')->nullable();
            $table->string('by')->nullable();
            $table->string('for')->nullable();
            $table->string('release')->nullable();
            $table->string('order_of')->nullable();
            $table->date('date')->nullable();
            $table->string('previous_term')->nullable();
            $table->string('remarks')->nullable();
            $table->date('date_of_discharge')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discharge_infos');
    }
};
