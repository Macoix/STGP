<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
  protected $table = 'calendarios';
    protected $fillable = [
      'fechaIni',
      'fechaFin',
      'todoeldia',
      'lugar',
      'color',
      'titulo',
      'proyecto_id'
    ];
    protected $hidden = ['id'];
}
