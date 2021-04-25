<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOaeToHearingDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hearing_developments', function (Blueprint $table) {
            $table->boolean('test_oae');
            $table->string('test_oae_report')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hearing_developments', function (Blueprint $table) {
            $table->dropColumn('test_oae');
            $table->dropColumn('test_oae_report');
        });
    }
}
