<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePregnanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->boolean('contamination_drinking_water');
            $table->json('contamination_drinking_water_type')->nullable();
            $table->boolean('hazardous_waste_site');
            $table->boolean('air_pollution');
            $table->json('air_pollution_type')->nullable();
            $table->boolean('pasticides_expose');
            $table->string('physical_activities_during_pregnancy');
            $table->boolean('intercourse_during_pregnancy');
            $table->json('intercourse_during_pregnancy_time_phase')->nullable();
            $table->json('intercourse_during_pregnancy_unusual_symptom')->nullable();
            $table->string('intercourse_during_post_conception');
            $table->boolean('stress');
            $table->string('stress_type')->nullable();
            $table->boolean('gestetional_diabetes_mellitus');
            $table->boolean('fever');
            $table->string('fever_period')->nullable();
            $table->boolean('abdominal_trauma');
            $table->string('abdominal_trauma_period')->nullable();
            $table->string('amniotic_membranes_rupture');
            $table->string('amniotic_fluid_amount');
            $table->boolean('early_amniotic_fluid_leak');
            $table->foreignId('mother_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pregnancies');
    }
}
