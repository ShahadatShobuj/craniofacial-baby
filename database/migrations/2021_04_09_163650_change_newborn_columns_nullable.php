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
            $table->string('mother_age_during_affected_pregnancy')->nullable()->change();
            $table->string('father_age_during_affected_pregnancy')->nullable()->change();
            $table->string('duration_of_pregnancy_at_delivery')->nullable()->change();
            $table->string('condition_at_birth')->nullable()->change();
            $table->string('sex_orientation')->nullable()->change();
            $table->string('weight')->nullable()->change();
            $table->string('apgar_score')->nullable()->change();
            $table->string('congenital_craniofacial_cleft')->nullable()->change();
            $table->string('tessier_classification_site')->nullable()->change();
            $table->string('tessier_classification_site_type_right')->nullable()->change();
            $table->string('tessier_classification_site_type_left')->nullable()->change();
            $table->string('tessier_classification_anatomical_type')->nullable()->change();
            $table->boolean('tessier_classification_microtia')->nullable()->change();
            $table->string('tessier_classification_choanal_attresia')->nullable()->change();
            $table->boolean('other_congenital_anomalies')->nullable()->change();
            $table->boolean('any_syndrome_suspected')->nullable()->change();
            $table->boolean('corneal_opacities_and_other_deformities')->nullable()->change();
            $table->boolean('ring_constrictions')->nullable()->change();
            $table->boolean('nasal_obstruction')->nullable()->change();
            $table->boolean('palatal_abnormality')->nullable()->change();
            $table->string('cleft_lip')->nullable()->change();
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
            $table->string('mother_age_during_affected_pregnancy')->nullable(false)->change();
            $table->string('father_age_during_affected_pregnancy')->nullable(false)->change();
            $table->string('duration_of_pregnancy_at_delivery')->nullable(false)->change();
            $table->string('condition_at_birth')->nullable(false)->change();
            $table->string('sex_orientation')->nullable(false)->change();
            $table->string('weight')->nullable(false)->change();
            $table->string('apgar_score')->nullable(false)->change();
            $table->string('congenital_craniofacial_cleft')->nullable(false)->change();
            $table->string('tessier_classification_site')->nullable(false)->change();
            $table->string('tessier_classification_site_type_right')->nullable(false)->change();
            $table->string('tessier_classification_site_type_left')->nullable(false)->change();
            $table->string('tessier_classification_anatomical_type')->nullable(false)->change();
            $table->boolean('tessier_classification_microtia')->nullable(false)->change();
            $table->string('tessier_classification_choanal_attresia')->nullable(false)->change();
            $table->boolean('other_congenital_anomalies')->nullable(false)->change();
            $table->boolean('any_syndrome_suspected')->nullable(false)->change();
            $table->boolean('corneal_opacities_and_other_deformities')->nullable(false)->change();
            $table->boolean('ring_constrictions')->nullable(false)->change();
            $table->boolean('nasal_obstruction')->nullable(false)->change();
            $table->boolean('palatal_abnormality')->nullable(false)->change();
            $table->string('cleft_lip')->nullable(false)->change();
        });
    }
}
