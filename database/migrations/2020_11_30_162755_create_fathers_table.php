<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->string('occupation');
            $table->string('habbit');
            $table->boolean('congenital_anomaly')->default(false);
            $table->json('co_morbidities');
            $table->json('medications');
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
        Schema::dropIfExists('fathers');
    }
}
