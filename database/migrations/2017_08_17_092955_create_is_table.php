<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('is', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exercice');
            $table->double('ca_ht');
            $table->double('r_comptable');
            $table->double('r_fiscale');
            $table->double('impot');
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
        Schema::dropIfExists('is');
    }
}
