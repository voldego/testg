<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCnssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cnsses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exercice');
            $table->string('client');
            $table->string('masse_salariale');
            $table->string('pen_cnss');
            $table->string('pen_amo');
            $table->string('date_pay');
            $table->string('date_depot');
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
        Schema::dropIfExists('cnsses');
    }
}
