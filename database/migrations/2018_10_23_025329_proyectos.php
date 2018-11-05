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
        $table->string('tipo');
        $table->integer('tutor_user_id');
        $table->integer('carrera_id');
        $table->text('titulo');
        $table->text('resumen');
        $table->string('anexo')->nullable();
        $table->string('anexo_estado');
        $table->string('tomo')->nullable();
        $table->string('tomo_estado')->nullable();
        $table->string('veredicto')->nullable();
        $table->integer('proyecto_estado_id');
        $table->integer('user_id');
        $table->integer('second_user_id');
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
