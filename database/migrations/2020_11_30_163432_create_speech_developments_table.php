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
            $table->string('development_of_p');
            $table->string('development_of_b');
            $table->string('development_of_m');
            $table->string('development_of_c');
            $table->string('development_of_j');
            $table->string('development_of_k');
            $table->string('development_of_g');
            $table->string('development_of_f');
            $table->string('development_of_v');
            $table->string('development_of_Sh');
            $table->string('development_of_s');
            $table->string('development_of_a');
            $table->string('development_of_i');
            $table->string('development_of_u');
            // $table->string('development_of_p_description')->nullable();
            // $table->string('development_of_b_description')->nullable();
            // $table->string('development_of_m_description')->nullable();
            // $table->string('development_of_c_description')->nullable();
            // $table->string('development_of_j_description')->nullable();
            // $table->string('development_of_k_description')->nullable();
            // $table->string('development_of_g_description')->nullable();
            // $table->string('development_of_f_description')->nullable();
            // $table->string('development_of_v_description')->nullable();
            // $table->string('development_of_S_descriptionh')->nullable();
            // $table->string('development_of_s_description')->nullable();
            // $table->string('development_of_a_description')->nullable();
            // $table->string('development_of_i_description')->nullable();
            // $table->string('development_of_u_description')->nullable();
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
