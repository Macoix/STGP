<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Periodo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('periodos', function (Blueprint $table) {
        $table->increments('id');
        $table->String('facultad');
        $table->String('carrera_id');
        $table->String('ano');
        $table->String('periodo');
        $table->String('estado');
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
      Schema::dropIfExists('periodo');

    }
}
