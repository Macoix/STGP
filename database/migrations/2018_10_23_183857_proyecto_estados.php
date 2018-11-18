<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProyectoEstados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proyectos_estados', function (Blueprint $table) {
          $table->increments('proyecto_estado_id');
          $table->integer('proyecto_id');
          $table->string('nombre');
          $table->longText('comentario')->nullable();
          $table->integer('user_id');
          $table->timestamps();

          // $table->foreign('proyecto_estado_id')->references('proyecto_estado_id')->on('proyectos');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('proyectos_estados');
    }
}
