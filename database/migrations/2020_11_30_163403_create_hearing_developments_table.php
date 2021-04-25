<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHearingDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hearing_developments', function (Blueprint $table) {
            $table->id();
            $table->string('response_calling_by_name');
            $table->string('screening_by_ling_sound_s');
            $table->string('screening_by_ling_sound_Sh');
            $table->string('screening_by_ling_sound_a');
            $table->string('screening_by_ling_sound_i');
            $table->string('screening_by_ling_sound_u');
            $table->string('screening_by_ling_sound_m');
            $table->boolean('test_pta');
            $table->string('test_pta_report')->nullable();
            $table->boolean('test_abr');
            $table->string('test_abr_report')->nullable();
            $table->boolean('test_srt');
            $table->string('test_srt_report')->nullable();
            $table->boolean('test_tympanometry');
            $table->string('test_tympanometry_report')->nullable();
            $table->boolean('test_play_audiometry');
            $table->string('test_play_audiometry_report')->nullable();
            $table->boolean('test_boa');
            $table->string('test_boa_report')->nullable();
            $table->boolean('test_oae');
            $table->string('test_oae_report')->nullable();
            $table->foreignId('craniofacial_cleft_baby_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('hearing_developments');
    }
}
