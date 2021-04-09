<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeHearingDevelopmentColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hearing_developments', function (Blueprint $table) {
            $table->string('response_calling_by_name')->nullable()->change();
            $table->string('screening_by_ling_sound_s')->nullable()->change();
            $table->string('screening_by_ling_sound_Sh')->nullable()->change();
            $table->string('screening_by_ling_sound_a')->nullable()->change();
            $table->string('screening_by_ling_sound_i')->nullable()->change();
            $table->string('screening_by_ling_sound_u')->nullable()->change();
            $table->string('screening_by_ling_sound_m')->nullable()->change();
            $table->boolean('test_pta')->nullable()->change();
            $table->boolean('test_abr')->nullable()->change();
            $table->boolean('test_srt')->nullable()->change();
            $table->boolean('test_tympanometry')->nullable()->change();
            $table->boolean('test_play_audiometry')->nullable()->change();
            $table->boolean('test_boa')->nullable()->change();
            $table->boolean('test_oae')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hearing_developments', function (Blueprint $table) {
            $table->string('response_calling_by_name')->nullable(false)->change();
            $table->string('screening_by_ling_sound_s')->nullable(false)->change();
            $table->string('screening_by_ling_sound_Sh')->nullable(false)->change();
            $table->string('screening_by_ling_sound_a')->nullable(false)->change();
            $table->string('screening_by_ling_sound_i')->nullable(false)->change();
            $table->string('screening_by_ling_sound_u')->nullable(false)->change();
            $table->string('screening_by_ling_sound_m')->nullable(false)->change();
            $table->boolean('test_pta')->nullable(false)->change();
            $table->boolean('test_abr')->nullable(false)->change();
            $table->boolean('test_srt')->nullable(false)->change();
            $table->boolean('test_tympanometry')->nullable(false)->change();
            $table->boolean('test_play_audiometry')->nullable(false)->change();
            $table->boolean('test_boa')->nullable(false)->change();
            $table->boolean('test_oae')->nullable(false)->change();
        });
    }
}
