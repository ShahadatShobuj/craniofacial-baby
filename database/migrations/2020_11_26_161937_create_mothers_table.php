<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->string('occupation');
            $table->string('habbit');
            $table->tinyInteger('number_of_cigerettes')->nullable();
            $table->boolean('congenital_anomaly')->default(false);
            $table->json('co_morbidities');
            $table->json('medications');
            $table->string('exposure_to_insecticides');
            $table->string('exposure_to_insecticides_name')->nullable();
            $table->string('number_of_pregnancies');
            $table->string('ho_pregnancy_loss');
            $table->string('ho_pregnancy_termination');
            $table->string('condition_of_alive_babies');
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
        Schema::dropIfExists('mothers');
    }
}
