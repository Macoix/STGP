<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
  protected $table = 'comites';
  protected $primaryKey = 'comite_id';
  protected $fillable = [
    'comite_id',
    'carrera_id',
    'user_id',
  ];

  public function carrera(){
    return $this->belongsTo('App\Carrera','carrera_id');
  }

  public function users()
  {
    return $this->belongsTo('App\User','user_id');
  }
}
