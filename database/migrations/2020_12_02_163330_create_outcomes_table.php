<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('standard_photographic_views');
            $table->string('video_speech_recordings');
            $table->string('vision_test');
            $table->string('nasal_airway_evaluation');
            $table->string('educational_occupational_attainments');
            $table->string('marital_status');
            $table->tinyInteger('number_of_child')->nullable();
            $table->tinyInteger('number_of_abnormal_child')->nullable();
            $table->string('parents_review_of_appearance');
            $table->string('parents_review_of_breathing');
            $table->string('parents_review_of_dental');
            $table->string('parents_review_of_eating');
            $table->string('parents_review_of_speech');
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
        Schema::dropIfExists('outcomes');
    }
}
