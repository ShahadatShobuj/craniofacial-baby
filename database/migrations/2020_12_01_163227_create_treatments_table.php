<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->json('evaluation_of_imaging');
            $table->string('dissection_type');
            $table->boolean('dissection_of_eyelid_surgery');
            $table->boolean('dissection_of_choanal_atresia_surgery');
            $table->boolean('dissection_of_palate_surgery');
            $table->boolean('dissection_of_alveolar_cleft_surgery');
            $table->json('orthodontic_care');
            $table->boolean('cancer_malignancy_developed_cleft_child');
            $table->boolean('genetic_analysis_blood_sample_taken');
            $table->boolean('genetic_analysis_buccal_mucosal_sample_taken');
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
        Schema::dropIfExists('treatments');
    }
}
