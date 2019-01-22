<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tutores', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('carrera_id');
        $table->integer('user_id');
        $table->string('escalafon')->nullable();
        $table->string('condicion')->nullable();
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
      Schema::dropIfExists('tutores');

    }
}
