<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTreatmentColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->json('evaluation_of_imaging')->nullable()->change();
            $table->string('dissection_type')->nullable()->change();
            $table->boolean('dissection_of_eyelid_surgery')->nullable()->change();
            $table->boolean('dissection_of_choanal_atresia_surgery')->nullable()->change();
            $table->boolean('dissection_of_palate_surgery')->nullable()->change();
            $table->boolean('dissection_of_alveolar_cleft_surgery')->nullable()->change();
            $table->json('orthodontic_care')->nullable()->change();
            $table->boolean('cancer_malignancy_developed_cleft_child')->nullable()->change();
            $table->boolean('genetic_analysis_blood_sample_taken')->nullable()->change();
            $table->boolean('genetic_analysis_buccal_mucosal_sample_taken')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->json('evaluation_of_imaging')->nullable(false)->change();
            $table->string('dissection_type')->nullable(false)->change();
            $table->boolean('dissection_of_eyelid_surgery')->nullable(false)->change();
            $table->boolean('dissection_of_choanal_atresia_surgery')->nullable(false)->change();
            $table->boolean('dissection_of_palate_surgery')->nullable(false)->change();
            $table->boolean('dissection_of_alveolar_cleft_surgery')->nullable(false)->change();
            $table->json('orthodontic_care')->nullable(false)->change();
            $table->boolean('cancer_malignancy_developed_cleft_child')->nullable(false)->change();
            $table->boolean('genetic_analysis_blood_sample_taken')->nullable(false)->change();
            $table->boolean('genetic_analysis_buccal_mucosal_sample_taken')->nullable(false)->change();
        });
    }
}
