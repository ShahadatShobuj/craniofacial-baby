<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFatherColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fathers', function (Blueprint $table) {
            $table->string('occupation')->nullable()->change();
            $table->string('habbit')->nullable()->change();
            $table->json('co_morbidities')->nullable()->change();
            $table->json('medications')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fathers', function (Blueprint $table) {
            $table->string('occupation')->nullable(false)->change();
            $table->string('habbit')->nullable(false)->change();
            $table->json('co_morbidities')->nullable(false)->change();
            $table->json('medications')->nullable(false)->change();
        });
    }
}
