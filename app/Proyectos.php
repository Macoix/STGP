<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
  protected $primarykey = 'proyecto_id';
  protected $fillable = [
    'tipo',
    'tutor_user_id',
    'carrera_id',
    'titulo',
    'resumen',
    'documento',
    'anexo',
    'anexo_estado',
    'tomo',
    'tomo_estado',
    'veredicto',
    'proyecto_estado_id',
    'user_id',
    'second_user_id',

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
}
