<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
  protected $fillable = [
    'proyecto_id',
    'tipo',
    'tutor_user_id',
    'carrera_id',
    'titulo',
    'resumen',
    'documento',
    'fact_1_estado',
    'fact_2',
    'fact_2_estado',
    'veredicto',
    'proyecto_estado_id',
    'user_id',
    'second_user_id',

  ];
  // public function carrera()
  // {
  //   return this->belongsTo('App\Carrera','carrera_id');
  // }
}
