<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOutcomeColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('outcomes', function (Blueprint $table) {
            $table->string('standard_photographic_views')->nullable()->change();
            $table->string('video_speech_recordings')->nullable()->change();
            $table->string('vision_test')->nullable()->change();
            $table->string('nasal_airway_evaluation')->nullable()->change();
            $table->string('educational_occupational_attainments')->nullable()->change();
            $table->string('marital_status')->nullable()->change();
            $table->string('parents_review_of_appearance')->nullable()->change();
            $table->string('parents_review_of_breathing')->nullable()->change();
            $table->string('parents_review_of_dental')->nullable()->change();
            $table->string('parents_review_of_eating')->nullable()->change();
            $table->string('parents_review_of_speech')->nullable()->change();
            $table->string('report')->nullable()->change();
            $table->string('interviewer')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('outcomes', function (Blueprint $table) {
            $table->string('standard_photographic_views')->nullable(false)->change();
            $table->string('video_speech_recordings')->nullable(false)->change();
            $table->string('vision_test')->nullable(false)->change();
            $table->string('nasal_airway_evaluation')->nullable(false)->change();
            $table->string('educational_occupational_attainments')->nullable(false)->change();
            $table->string('marital_status')->nullable(false)->change();
            $table->string('parents_review_of_appearance')->nullable(false)->change();
            $table->string('parents_review_of_breathing')->nullable(false)->change();
            $table->string('parents_review_of_dental')->nullable(false)->change();
            $table->string('parents_review_of_eating')->nullable(false)->change();
            $table->string('parents_review_of_speech')->nullable(false)->change();
            $table->string('report')->nullable(false)->change();
            $table->string('interviewer')->nullable(false)->change();
        });
    }
}
