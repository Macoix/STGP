<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurado extends Model
{
  protected $table = 'jurados';
  protected $primaryKey = 'jurado_id';
  protected $fillable = [
    'jurado_id',
    'carrera_id',
    'user_id',
  ];

  public function users()
  {
    return $this->belongsTo('App\User','user_id');
  }

  public function carrera()
  {
    return $this->belongsTo('App\Carrera','carrera_id');
  }
}
