<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios', function (Blueprint $table) {
          $table->increments('id');
          $table->datetime('fechaIni');
          $table->datetime('fechaFin')->nullable();
          $table->boolean('todoeldia')->nullable();
          $table->string('color')->nullable();
          $table->mediumText('titulo')->nullable();
          $table->integer('proyecto_id')->unsigned();
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
        Schema::dropIfExists('calendarios');
    }
}
