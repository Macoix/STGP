<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProyectoEvaluacionesComite;
use App\ProyectoEstado;
use App\Proyectos;
use Auth;


class ProyectoEvaluacionesComiteController extends Controller
{
  public function store(Request $request, $id)
  {
    $evaluacion = new ProyectoEvaluacionesComite;
    $evaluacion->proyecto_id = $id;
    $evaluacion->veredicto = $request->estado_comite;
    $evaluacion->observaciones = $request->observaciones_comite;
    $evaluacion->estado = 'Procesado';
    $evaluacion->user_id = Auth::user()->id;
    $evaluacion->save();

    return redirect()->route('proyectos.show',$id);
  }

  public function aprobar($id)
  {

    $evaluacion = ProyectoEvaluacionesComite::where('proyecto_id', $id)
    ->get();
    $proyecto = Proyectos::where('proyecto_id',$id)
    ->get();
    // dd($proyecto);

    $proyecto_estado = new ProyectoEstado;
    $proyecto_estado->proyecto_id = $id;

    $aprobados= 0;
    $observaciones = 0;
    for($i=0; $i<count($evaluacion); $i++){
      if($evaluacion[$i]->veredicto == 'aprobar'){
        $aprobados += 1;
      }
      if($evaluacion[$i]->observaciones != '') {
        $observaciones += 1;
      }
    }

    if($aprobados == 3 && $observaciones == 0){
      $proyecto_estado->nombre = 'aprobado_evaluacion_comite';
      $proyecto_estado->comentario = 'El proyecto fue aprobado por el comite.';
    }elseif($aprobados == 3 && $observaciones > 0) {
      $proyecto_estado->nombre = 'aprobado_observaciones_evaluacion_comite';
      $proyecto_estado->comentario = 'El proyecto fue aprobado por el comite con observaciones.';
    }else{
      $proyecto_estado->nombre = 'no_aprobado_evaluacion_comite';
      $proyecto_estado->comentario = 'El proyecto no fue aprobado por el comite.';
    }
    $proyecto_estado->user_id = Auth::user()->id;
    $proyecto_estado->save();

    $proyecto_estado = new ProyectoEstado;
    $proyecto_estado->proyecto_id = $id;
    $proyecto_estado->nombre = 'pendiente_tomo2';
    $proyecto_estado->comentario = 'En espera de la subida del tomo 2';
    $proyecto_estado->user_id = Auth::user()->id;
    $proyecto_estado->save();

    $proyecto[0]->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
    if($aprobados == 3 && $observaciones == 0){
      $proyecto[0]->tomo_estado = 'aprobado';
    }elseif($aprobados == 3 && $observaciones > 0) {
      $proyecto[0]->tomo_estado = 'aprobado con observaciones';
    }else{
      $proyecto[0]->tomo_estado = 'rechazado';
    }
    // $proyecto[0]->tomo2_estado = 'pendiente';
    // dd($proyecto[0]->proyecto_estado_id);
    $proyecto[0]->update();


    return redirect()->route('proyectos.show',$id);
  }
}
