<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exercice');
            $table->string('periode');
            $table->double('ca_ht');
            $table->double('tva_col');
            $table->double('credit_precedent');
            $table->double('tva_due');
            $table->double('credit_tva_periode');
            $table->string('date_depot');
            $table->longText('observation');
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
        Schema::dropIfExists('tvas');
    }
}
