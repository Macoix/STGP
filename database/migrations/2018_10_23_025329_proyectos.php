<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Proyectos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('proyectos', function (Blueprint $table) {
        $table->increments('proyecto_id');
        $table->integer('periodo_id');
        $table->string('codigo');
        $table->string('tipo');
        $table->integer('tutor_user_id');
        $table->integer('carrera_id');
        $table->text('titulo');
        $table->text('resumen');
        $table->string('anexo')->nullable();
        $table->string('anexo_estado');
        $table->string('tomo')->nullable();
        $table->string('tomo_estado')->nullable();
        $table->string('tomo2')->nullable();
        $table->string('tomo2_estado')->nullable();
        $table->string('veredicto')->nullable();
        $table->integer('proyecto_estado_id')->unsigned();
        $table->integer('user_id')->unsigned();
        $table->integer('second_user_id');
        $table->integer('calendario_id')->unsigned()->nullable();
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
      Schema::dropIfExists('proyectos');
    }
}
