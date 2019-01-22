<?php

namespace App\Http\Controllers;
use App\Decano;
use Illuminate\Http\Request;

class DecanoController extends Controller
{
  public function index()
  {
    $decanos = Decano::first();
    // dd($decanos);
    return view('vendor.adminlte.decano.index', compact('decanos'));

  }

  public function update(Request $request, Decano $decano)
  {
    $decano->update([
      'nombre' => $request['nombre'],
      'apellido' => $request['apellido'],
      'numero_identificacion' => $request['numero'],
    ]);

    return redirect()->route('decano.index');
  }
}
