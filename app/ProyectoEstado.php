<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoEstado extends Model
{
  protected $table = 'proyectos_estados';
  protected $primaryKey = 'id';
  protected $fillable = [
      'id',
      'nombre',
      'proyecto_id',
      'comentario',
      'user_id'
  ];
}
