<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraniofacialCleftBabiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('craniofacial_cleft_babies', function (Blueprint $table) {
            $table->id();
            $table->string('baby_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('guardian_name');
            // $table->string('email')->unique();
            $table->string('operation_age');
            $table->string('current_age');
            $table->string('first_contact');
            $table->string('alternate_contact')->nullable();
            $table->boolean('consanguineous_marriage')->default(false);
            $table->string('consanguinity')->nullable();
            $table->boolean('family_cleft')->default(false);
            $table->string('family_cleft_relatives')->nullable();
            $table->boolean('folic_acid_supplementation')->default(false);
            $table->boolean('maternity_diet')->default(false);
            $table->string('created_by');
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
        Schema::dropIfExists('craniofacial_cleft_babies');
    }
}
