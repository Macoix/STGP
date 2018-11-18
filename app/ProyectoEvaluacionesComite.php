<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoEvaluacionesComite extends Model
{
  protected $table = 'proyectos_evaluaciones_comite';
  protected $primaryKey = 'proyecto_evaluacion_comite_id';
  protected $fillable = [
      'proyecto_evaluacion_comite_id',
      'proyecto_id',
      'veredicto',
      'observaciones',
      'estado',
      'user_id'
  ];
}
