<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cin');
            $table->string('tel');
            $table->integer('cnss');
            $table->string('rib');
            $table->string('email');
            $table->string('date_naissance');
            $table->string('fonction');
            $table->string('banque');
            $table->string('etat');
            $table->longText('adresse');
            $table->longText('adresse_banque');
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
        Schema::dropIfExists('personnels');
    }
}
