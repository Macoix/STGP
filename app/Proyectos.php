<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
  protected $table = 'proyectos';
  protected $primaryKey = 'proyecto_id';
  protected $fillable = [
    'periodo_id',
    'codigo',
    'tipo',
    'tutor_user_id',
    'carrera_id',
    'titulo',
    'resumen',
    'anexo',
    'anexo_estado',
    'tomo',
    'tomo_estado',
    'veredicto',
    'proyecto_estado_id',
    'user_id',
    'second_user_id',
    'calendario_id',

  ];
  public function carrera()
  {
    return $this->belongsTo('App\Carrera','carrera_id');
  }

  public function autor()
  {
    return $this->belongsTo('App\User','user_id');
  }

  public function coautor()
  {
    return $this->belongsTo('App\User','second_user_id');
  }

  // public function estado()
  // {
  //   return $this->belongsTo('App\ProyectoEstado','proyecto_estado_id');
  // }
}
