<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HJurado extends Model
{
  protected $table = 'horas_jurados';
  protected $primaryKey = 'horas_jurados_id';
  protected $fillable = [
    'horas_jurados_id',
    'user_id',
    'proyecto_id',
    'horas',
    'observaciones',
    ];
}
