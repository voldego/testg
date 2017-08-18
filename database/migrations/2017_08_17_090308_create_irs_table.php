<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exercice');
            $table->string('periode');
            $table->string('masse_salariale');
            $table->double('montant_ir');
            $table->string('date_pay');
            $table->string('quittance');
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
        Schema::dropIfExists('irs');
    }
}
