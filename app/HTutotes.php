<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HTutotes extends Model
{
  protected $table = 'horas_tutores';
  protected $primaryKey = 'horas_tutores_id';
  protected $fillable = [
    'horas_tutores_id',
    'user_id',
    'proyecto_id',
    'horas',
    'observaciones',
    ];

  public function tutores()
  {
    return $this->belongsTo('App\Tutores','user_id');
  }

  public function proyecto()
  {
    return $this->belongsTo('App\Proyectos','proyecto_id');
  }
}
