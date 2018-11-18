<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoEvaluacionesComitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proyectos_evaluaciones_comite', function (Blueprint $table) {
          $table->increments('proyecto_evaluacion_comite_id');
          $table->integer('proyecto_id');
          $table->string('veredicto')->nullable();
          $table->text('observaciones')->nullable();
          $table->string('estado');
          $table->integer('user_id');
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
        Schema::dropIfExists('proyecto_evaluaciones_comites');
    }
}
