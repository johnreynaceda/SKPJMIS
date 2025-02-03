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
        Schema::create('inmate_fingerprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inmate_id');
            $table->binary('right_thumb')->nullable();
            $table->longText('right_thumb_path')->nullable();
            $table->binary('right_index')->nullable();
            $table->longText('right_index_path')->nullable();
            $table->binary('right_middle')->nullable();
            $table->longText('right_middle_path')->nullable();
            $table->binary('right_ring')->nullable();
            $table->longText('right_ring_path')->nullable();
            $table->binary('right_little')->nullable();
            $table->longText('right_little_path')->nullable();
            $table->binary('left_thumb')->nullable();
            $table->longText('left_thumb_path')->nullable();
            $table->binary('left_index')->nullable();
            $table->longText('left_index_path')->nullable();
            $table->binary('left_middle')->nullable();
            $table->longText('left_middle_path')->nullable();
            $table->binary('left_ring')->nullable();
            $table->longText('left_ring_path')->nullable();
            $table->binary('left_little')->nullable();
            $table->longText('left_little_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmate_fingerprints');
    }
};
