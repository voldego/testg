<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletin_paie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periode');
            $table->string('date_paie');
            $table->double('montant');
            $table->double('jour_travail');
            $table->double('cotisation');
            $table->integer('personnel_id');

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
        Schema::dropIfExists('bulletin_paie');
    }
}
