<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeMotherColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mothers', function (Blueprint $table) {
            $table->string('occupation')->nullable()->change();
            $table->string('habbit')->nullable()->change();
            $table->json('co_morbidities')->nullable()->change();
            $table->json('medications')->nullable()->change();
            $table->string('exposure_to_insecticides')->nullable()->change();
            $table->string('number_of_pregnancies')->nullable()->change();
            $table->string('ho_pregnancy_loss')->nullable()->change();
            $table->string('ho_pregnancy_termination')->nullable()->change();
            $table->string('condition_of_alive_babies')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mothers', function (Blueprint $table) {
            $table->string('occupation')->nullable(false)->change();
            $table->string('habbit')->nullable(false)->change();
            $table->json('co_morbidities')->nullable(false)->change();
            $table->json('medications')->nullable(false)->change();
            $table->string('exposure_to_insecticides')->nullable(false)->change();
            $table->string('number_of_pregnancies')->nullable(false)->change();
            $table->string('ho_pregnancy_loss')->nullable(false)->change();
            $table->string('ho_pregnancy_termination')->nullable(false)->change();
            $table->string('condition_of_alive_babies')->nullable(false)->change();
        });
    }
}
