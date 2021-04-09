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
            $table->boolean('contamination_drinking_water')->nallable()->change();
            $table->boolean('hazardous_waste_site')->nallable()->change();
            $table->boolean('air_pollution')->nallable()->change();
            $table->boolean('pasticides_expose')->nallable()->change();
            $table->string('physical_activities_during_pregnancy')->nallable()->change();
            $table->boolean('intercourse_during_pregnancy')->nallable()->change();
            $table->string('intercourse_during_post_conception')->nallable()->change();
            $table->boolean('stress')->nallable()->change();
            $table->boolean('gestetional_diabetes_mellitus')->nallable()->change();
            $table->boolean('fever')->nallable()->change();
            $table->boolean('abdominal_trauma')->nallable()->change();
            $table->string('amniotic_membranes_rupture')->nallable()->change();
            $table->string('amniotic_fluid_amount')->nallable()->change();
            $table->boolean('early_amniotic_fluid_leak')->nallable()->change();
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
            $table->boolean('contamination_drinking_water')->nallable(false)->change();
            $table->boolean('hazardous_waste_site')->nallable(false)->change();
            $table->boolean('air_pollution')->nallable(false)->change();
            $table->boolean('pasticides_expose')->nallable(false)->change();
            $table->string('physical_activities_during_pregnancy')->nallable(false)->change();
            $table->boolean('intercourse_during_pregnancy')->nallable(false)->change();
            $table->string('intercourse_during_post_conception')->nallable(false)->change();
            $table->boolean('stress')->nallable(false)->change();
            $table->boolean('gestetional_diabetes_mellitus')->nallable(false)->change();
            $table->boolean('fever')->nallable(false)->change();
            $table->boolean('abdominal_trauma')->nallable(false)->change();
            $table->string('amniotic_membranes_rupture')->nallable(false)->change();
            $table->string('amniotic_fluid_amount')->nallable(false)->change();
            $table->boolean('early_amniotic_fluid_leak')->nallable(false)->change();
        });
    }
}
