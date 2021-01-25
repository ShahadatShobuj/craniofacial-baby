<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeechDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speech_developments', function (Blueprint $table) {
            $table->id();
            $table->string('development');
            $table->string('development_of_single_word');
            $table->string('development_of_receptive_skills');
            $table->boolean('development_of_p');
            $table->boolean('development_of_b');
            $table->boolean('development_of_m');
            $table->boolean('development_of_c');
            $table->boolean('development_of_j');
            $table->boolean('development_of_k');
            $table->boolean('development_of_g');
            $table->boolean('development_of_f');
            $table->boolean('development_of_v');
            $table->boolean('development_of_Sh');
            $table->boolean('development_of_s');
            $table->boolean('development_of_a');
            $table->boolean('development_of_i');
            $table->boolean('development_of_u');
            $table->boolean('nasality');
            $table->string('nasality_type')->nullable();
            $table->boolean('facial_grimace');
            $table->string('articulation');
            $table->string('vpi');
            $table->string('vpi_nasoendoscopy')->nullable();
            $table->string('vpi_videofluroscopy')->nullable();
            $table->boolean('vpi_surgery');
            $table->string('vpi_surgery_type')->nullable();
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
        Schema::dropIfExists('speech_developments');
    }
}
