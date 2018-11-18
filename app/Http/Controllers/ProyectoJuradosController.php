<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyectos;
use App\Jurado;
use App\ProyectoEstado;
use App\ProyectoJurados;
use Auth;

class ProyectoJuradosController extends Controller
{
  public function create($id)
  {
      $proyecto = Proyectos::findOrFail($id);

      $jurados = Jurado::join('users', 'users.id', '=', 'jurados.user_id')
          ->where('carrera_id', $proyecto->carrera_id)
          ->get();

      return view('vendor.adminlte.proyectos.crearjurado', compact('proyecto', 'jurados'));
  }

  public function store(Request $request, $id)
  {
      // dd($id);
      $jurado = new ProyectoJurados;
      $jurado->proyecto_id = $id;
      $jurado->fill($request->all());
      $jurado->user_id = Auth::user()->id;
      $jurado->save();

      $proyecto_estado = new ProyectoEstado;
      $proyecto_estado->proyecto_id = $id;
      $proyecto_estado->nombre = 'pendiente_evaluacion_jurado';
      $proyecto_estado->comentario = '';
      $proyecto_estado->user_id = Auth::user()->id;
      $proyecto_estado->save();

      $proyecto = Proyectos::findOrFail($id);
      $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
      $proyecto->save();

      return redirect()->route('proyectos.show',$id);
  }
}
