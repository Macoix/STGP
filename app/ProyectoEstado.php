<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoEstado extends Model
{
  protected $table = 'proyectos_estados';
  protected $primaryKey = 'proyecto_estado_id';
  protected $fillable = [
      'proyecto_estado_id',
      'nombre',
      'proyecto_id',
      'comentario',
      'user_id'
  ];
}
