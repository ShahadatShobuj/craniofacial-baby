<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewbornsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newborns', function (Blueprint $table) {
            $table->id();
            $table->string('mother_age_during_affected_pregnancy');
            $table->string('father_age_during_affected_pregnancy');
            $table->string('duration_of_pregnancy_at_delivery');
            $table->string('condition_at_birth');
            $table->string('condition_at_birth_disease')->nullable();
            $table->string('sex_orientation');
            $table->string('weight');
            $table->string('apgar_score');
            $table->string('congenital_craniofacial_cleft');
            $table->string('tessier_classification_site');
            $table->string('tessier_classification_site_type_right');
            $table->string('tessier_classification_site_type_left');
            $table->string('tessier_classification_anatomical_type');
            $table->boolean('tessier_classification_microtia');
            $table->string('tessier_classification_microtia_type')->nullable();
            $table->string('tessier_classification_choanal_attresia');
            $table->string('tessier_classification_choanal_attresia_site')->nullable();
            $table->string('tessier_classification_choanal_attresia_anatomical_type')->nullable();
            $table->boolean('other_congenital_anomalies');
            $table->json('other_congenital_anomalies_involved_system')->nullable();
            $table->boolean('any_syndrome_suspected');
            $table->boolean('corneal_opacities_and_other_deformities');
            $table->boolean('ring_constrictions');
            $table->json('ring_constrictions_involving_area')->nullable();
            $table->boolean('nasal_obstruction');
            $table->boolean('nasal_obstruction_treated')->nullable();
            $table->boolean('palatal_abnormality');
            $table->string('palatal_abnormality_type')->nullable();
            $table->string('cleft_lip');
            $table->string('cleft_lip_type')->nullable();
            $table->foreignId('mother_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('newborns');
    }
}
