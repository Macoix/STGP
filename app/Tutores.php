<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutores extends Model
{
  protected $fillable = [
    'id',
    'carrera_id',
    'user_id',
    'created_at',
    'updated_at'
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
