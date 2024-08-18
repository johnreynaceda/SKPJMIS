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
        Schema::create('other_information', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_father')->nullable();
            $table->string('name_of_mother')->nullable();
            $table->string('name_of_spouse')->nullable();
            $table->string('no_of_children')->nullable();
            $table->string('nearest_kin')->nullable();
            $table->string('address_of_kin')->nullable();
            $table->string('relationship')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('native_origin')->nullable();
            $table->string('political_affilation')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->string('course')->nullable();
            $table->string('occupation')->nullable();
            $table->string('color_of_hair')->nullable();
            $table->string('color_of_eyes')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('complexion')->nullable();
            $table->string('bertillon_marks')->nullable();
            $table->date('crime_commited')->nullable();
            $table->dateTime('date_time_arrested')->nullable();
            $table->string('arresting_officer')->nullable();
            $table->date('commited_in_jail')->nullable();
            $table->string('station')->nullable();
            $table->string('inmate_search_by')->nullable();
            $table->string('inmate_property_held_by')->nullable();
            $table->string('property_receipt_no')->nullable();
            $table->string('kind')->nullable();

            $table->string('medical_certificate_issued_remarks')->nullable();
            $table->date('date_issued')->nullable();
            $table->string('illness_prior_commitment')->nullable();
            $table->string('medications_used')->nullable();
            $table->string('jail_nurse')->nullable();
            $table->foreignId('inmate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_information');
    }
};
