<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
  protected $fillable = [
    'id',
    'name',
    'acronimo',
    'coordinador_user_id',
    'estado',
    'created_at',
    'updated_at'
  ];

  public function user()
  {
    return $this->belongsTo('App\User', 'coordinador_user_id');
  }
}
