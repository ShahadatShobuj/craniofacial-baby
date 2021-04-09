<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDeliveryColumnsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->string('mode')->nullable()->change();
            $table->string('type')->nullable()->change();
            $table->string('membranes_rupture_type')->nullable()->change();
            $table->string('time_after_membranes_rupture')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->string('mode')->nullable(false)->change();
            $table->string('type')->nullable(false)->change();
            $table->string('membranes_rupture_type')->nullable(false)->change();
            $table->string('time_after_membranes_rupture')->nullable(false)->change();
        });
    }
}
