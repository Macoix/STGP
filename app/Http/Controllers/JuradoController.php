<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurado;
use App\Carrera;
use App\User;

class JuradoController extends Controller
{
  public function index()
  {

    $jurados = Jurado::All();
    $users = User::select('id', 'nombre', 'apellido')
        ->where('rol_id', '!=', 5)
        ->get();
    $carreras = Carrera::where('estado','!=','eliminado')
    ->get();
    // dd($jurados);
    return view('vendor.adminlte.jurado.index',compact('jurados', 'users','carreras'));
  }

  public function store(Request $request)
  {
    $jurados = new Jurado;

    $jurados->fill([
      'carrera_id' => $request['carreraid'],
      'user_id' => $request['userid']
    ]);
    // dd($tutores);
    $jurados->save();
    return redirect()->route('jurado.index');
  }

  public function update(Request $request, $id)
  {
    $jurados = Jurado::where('jurado_id',$id)
    ->first();

    $jurados->carrera_id = $request['carreraid'];

    $jurados->save();
    return redirect()->route('jurado.index');
  }
}
