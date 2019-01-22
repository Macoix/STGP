<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comite;
use App\User;
use App\Carrera;

class ComiteController extends Controller
{
  public function index()
  {
    $comites = Comite::All();
    $users = User::select('id', 'nombre', 'apellido')
        ->where('rol_id', '!=', 5)
        ->get();
    $carreras = Carrera::where('estado','!=','eliminado')
    ->get();
    // dd($jurados);
    return view('vendor.adminlte.comite.index',compact('comites', 'users','carreras'));
  }

  public function store(Request $request)
  {
    $comites = new Comite;

    $comites->fill([
      'carrera_id' => $request['carreraid'],
      'user_id' => $request['userid']
    ]);
    // dd($tutores);
    $comites->save();
    return redirect()->route('comite.index');
  }

  public function update(Request $request, $id)
  {
    $comites = Comite::where('comite_id',$id)
    ->first();

    $comites->carrera_id = $request['carreraid'];

    $comites->save();
    return redirect()->route('comite.index');
  }
}
