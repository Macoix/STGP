<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decano extends Model
{
  protected $table = 'decanos';
  protected $primaryKey = 'id';
  protected $fillable = [
    'id',
    'nombre',
    'apellido',
    'numero_identificacion'
  ];
}
