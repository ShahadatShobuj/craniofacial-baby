<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSpeechDevelopmentColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('speech_developments', function (Blueprint $table) {
            $table->string('development')->nullable()->change();
            $table->string('development_of_single_word')->nullable()->change();
            $table->string('development_of_receptive_skills')->nullable()->change();
            $table->string('development_of_p')->nullable()->change();
            $table->string('development_of_b')->nullable()->change();
            $table->string('development_of_m')->nullable()->change();
            $table->string('development_of_c')->nullable()->change();
            $table->string('development_of_j')->nullable()->change();
            $table->string('development_of_k')->nullable()->change();
            $table->string('development_of_g')->nullable()->change();
            $table->string('development_of_f')->nullable()->change();
            $table->string('development_of_v')->nullable()->change();
            $table->string('development_of_Sh')->nullable()->change();
            $table->string('development_of_s')->nullable()->change();
            $table->string('development_of_a')->nullable()->change();
            $table->string('development_of_i')->nullable()->change();
            $table->string('development_of_u')->nullable()->change();
            $table->boolean('nasality')->nullable()->change();
            $table->boolean('facial_grimace')->nullable()->change();
            $table->string('articulation')->nullable()->change();
            $table->string('vpi')->nullable()->change();
            $table->boolean('vpi_surgery')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('speech_developments', function (Blueprint $table) {
            $table->string('development')->nullable(false)->change();
            $table->string('development_of_single_word')->nullable(false)->change();
            $table->string('development_of_receptive_skills')->nullable(false)->change();
            $table->string('development_of_p')->nullable(false)->change();
            $table->string('development_of_b')->nullable(false)->change();
            $table->string('development_of_m')->nullable(false)->change();
            $table->string('development_of_c')->nullable(false)->change();
            $table->string('development_of_j')->nullable(false)->change();
            $table->string('development_of_k')->nullable(false)->change();
            $table->string('development_of_g')->nullable(false)->change();
            $table->string('development_of_f')->nullable(false)->change();
            $table->string('development_of_v')->nullable(false)->change();
            $table->string('development_of_Sh')->nullable(false)->change();
            $table->string('development_of_s')->nullable(false)->change();
            $table->string('development_of_a')->nullable(false)->change();
            $table->string('development_of_i')->nullable(false)->change();
            $table->string('development_of_u')->nullable(false)->change();
            $table->boolean('nasality')->nullable(false)->change();
            $table->boolean('facial_grimace')->nullable(false)->change();
            $table->string('articulation')->nullable(false)->change();
            $table->string('vpi')->nullable(false)->change();
            $table->boolean('vpi_surgery')->nullable(false)->change();
        });
    }
}
