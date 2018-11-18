<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoJurados extends Model
{
  protected $table = 'proyecto_jurados';

  protected $primaryKey = 'proyecto_jurado_id';

  protected $fillable = [
      'proyecto_id',
      'presidente_user_id',
      'miembro1_user_id',
      'miembro2_user_id',
      'user_id'
  ];
}
