<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNewbornColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('newborns', function (Blueprint $table) {
            $table->string('mother_age_during_affected_pregnancy')->nallable()->change();
            $table->string('father_age_during_affected_pregnancy')->nallable()->change();
            $table->string('duration_of_pregnancy_at_delivery')->nallable()->change();
            $table->string('condition_at_birth')->nallable()->change();
            $table->string('sex_orientation')->nallable()->change();
            $table->string('weight')->nallable()->change();
            $table->string('apgar_score')->nallable()->change();
            $table->string('congenital_craniofacial_cleft')->nallable()->change();
            $table->string('tessier_classification_site')->nallable()->change();
            $table->string('tessier_classification_site_type_right')->nallable()->change();
            $table->string('tessier_classification_site_type_left')->nallable()->change();
            $table->string('tessier_classification_anatomical_type')->nallable()->change();
            $table->boolean('tessier_classification_microtia')->nallable()->change();
            $table->string('tessier_classification_choanal_attresia')->nallable()->change();
            $table->boolean('other_congenital_anomalies')->nallable()->change();
            $table->boolean('any_syndrome_suspected')->nallable()->change();
            $table->boolean('corneal_opacities_and_other_deformities')->nallable()->change();
            $table->boolean('ring_constrictions')->nallable()->change();
            $table->boolean('nasal_obstruction')->nallable()->change();
            $table->boolean('palatal_abnormality')->nallable()->change();
            $table->string('cleft_lip')->nallable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('newborns', function (Blueprint $table) {
            $table->string('mother_age_during_affected_pregnancy')->nallable(false)->change();
            $table->string('father_age_during_affected_pregnancy')->nallable(false)->change();
            $table->string('duration_of_pregnancy_at_delivery')->nallable(false)->change();
            $table->string('condition_at_birth')->nallable(false)->change();
            $table->string('sex_orientation')->nallable(false)->change();
            $table->string('weight')->nallable(false)->change();
            $table->string('apgar_score')->nallable(false)->change();
            $table->string('congenital_craniofacial_cleft')->nallable(false)->change();
            $table->string('tessier_classification_site')->nallable(false)->change();
            $table->string('tessier_classification_site_type_right')->nallable(false)->change();
            $table->string('tessier_classification_site_type_left')->nallable(false)->change();
            $table->string('tessier_classification_anatomical_type')->nallable(false)->change();
            $table->boolean('tessier_classification_microtia')->nallable(false)->change();
            $table->string('tessier_classification_choanal_attresia')->nallable(false)->change();
            $table->boolean('other_congenital_anomalies')->nallable(false)->change();
            $table->boolean('any_syndrome_suspected')->nallable(false)->change();
            $table->boolean('corneal_opacities_and_other_deformities')->nallable(false)->change();
            $table->boolean('ring_constrictions')->nallable(false)->change();
            $table->boolean('nasal_obstruction')->nallable(false)->change();
            $table->boolean('palatal_abnormality')->nallable(false)->change();
            $table->string('cleft_lip')->nallable(false)->change();
        });
    }
}
