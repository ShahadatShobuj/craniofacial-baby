<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePregnancyColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pregnancies', function (Blueprint $table) {
            $table->boolean('contamination_drinking_water')->nullable()->change();
            $table->boolean('hazardous_waste_site')->nullable()->change();
            $table->boolean('air_pollution')->nullable()->change();
            $table->boolean('pasticides_expose')->nullable()->change();
            $table->string('physical_activities_during_pregnancy')->nullable()->change();
            $table->boolean('intercourse_during_pregnancy')->nullable()->change();
            $table->string('intercourse_during_post_conception')->nullable()->change();
            $table->boolean('stress')->nullable()->change();
            $table->boolean('gestetional_diabetes_mellitus')->nullable()->change();
            $table->boolean('fever')->nullable()->change();
            $table->boolean('abdominal_trauma')->nullable()->change();
            $table->string('amniotic_membranes_rupture')->nullable()->change();
            $table->string('amniotic_fluid_amount')->nullable()->change();
            $table->boolean('early_amniotic_fluid_leak')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pregnancies', function (Blueprint $table) {
            $table->boolean('contamination_drinking_water')->nullable(false)->change();
            $table->boolean('hazardous_waste_site')->nullable(false)->change();
            $table->boolean('air_pollution')->nullable(false)->change();
            $table->boolean('pasticides_expose')->nullable(false)->change();
            $table->string('physical_activities_during_pregnancy')->nullable(false)->change();
            $table->boolean('intercourse_during_pregnancy')->nullable(false)->change();
            $table->string('intercourse_during_post_conception')->nullable(false)->change();
            $table->boolean('stress')->nullable(false)->change();
            $table->boolean('gestetional_diabetes_mellitus')->nullable(false)->change();
            $table->boolean('fever')->nullable(false)->change();
            $table->boolean('abdominal_trauma')->nullable(false)->change();
            $table->string('amniotic_membranes_rupture')->nullable(false)->change();
            $table->string('amniotic_fluid_amount')->nullable(false)->change();
            $table->boolean('early_amniotic_fluid_leak')->nullable(false)->change();
        });
    }
}
