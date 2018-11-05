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
          $table->increments('id');
          $table->integer('proyecto_id');
          $table->string('nombre');
          $table->string('comentario')->nullable();
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
      Schema::dropIfExists('proyectos_estados');
    }
}
