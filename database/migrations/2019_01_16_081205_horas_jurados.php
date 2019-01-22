<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HorasJurados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('horas_jurados', function (Blueprint $table) {
          $table->increments('horas_jurados_id');
          $table->integer('user_id');
          $table->integer('proyecto_id');
          $table->integer('horas')->nullable();
          $table->string('observaciones')->nullable();
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
        //
    }
}
