<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoJuradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_jurados', function (Blueprint $table) {
          $table->increments('proyecto_jurado_id');
          $table->integer('proyecto_id');
          $table->integer('presidente_user_id');
          $table->integer('miembro1_user_id');
          $table->integer('miembro2_user_id');
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
        Schema::dropIfExists('proyecto_jurados');
    }
}
