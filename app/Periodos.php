<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
  protected $fillable = [
    'id',
    'facultad',
    'ano',
    'periodo',
    'estado'
  ];
}
