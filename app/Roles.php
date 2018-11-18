<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  protected $fillable = [
    'id',
    'name',
    'guard_name',
    'created_at',
    'updated_at'
  ];

  public function users()
  {
    return $this->belongsTo('App\User','id');
  }
}
