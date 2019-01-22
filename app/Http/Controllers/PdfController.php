<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Carrera;
Use App\User;
use App\Tutores;
use App\proyectos;
use App\Periodos;
use App\ProyectoJurados;
use App\Decano;
use App\Calendario;
use Auth;

class PdfController extends Controller
{
    public function vista()
    {
      $carreras = Carrera::where('estado', '!=', 'inactivo')
          ->get();

      $user = User::where('rol_id','3')
      ->get();

      // $roles = Roles::where('name','estudiante')
      // ->get();

      $tutores = Tutores::All();
      return view('vendor.adminlte.pdf.formularioanexo', compact('carreras', 'tutores', 'user'));

    }

    public function anexod(Request $request, $id)
    {

    $autor = User::where('id', $id)
    ->first();

    $coautor = User::where('id', $request->coautor)
    ->first();

    $carrera = Carrera::where('id', $request->carrera)
    ->first();

    $tutor = User::where('id', $request->tutor)
    ->first();

    $direccion = $request->direccion;

    $indice = $request->indice;

    $titulo = $request->titulo;

    $resumen = $request->resumen;

    $lugar = $request->lugar;

    $tiempo = $request->tiempo;

      $pdf = PDF::loadView('vendor.adminlte.pdf.anexod', compact('autor', 'coautor', 'carrera', 'tutor', 'direccion', 'indice', 'titulo', 'resumen', 'lugar', 'tiempo'))->setPaper('letter','portrait');
      return $pdf->stream('Anexo D.pdf');
    }

    public function cartaDecano($id)
    {
      $proyecto = Proyectos::join('carreras as carre', 'carre.id', '=', 'proyectos.carrera_id')
          // ->join('proyectos_estados', 'proyectos_estados.proyecto_estado_id', '=', 'proyectos.proyecto_estado_id')
          ->join('users as autor', 'autor.id', '=', 'proyectos.user_id')
          ->join('users as coautor', 'coautor.id', '=', 'proyectos.second_user_id')
          ->join('users as coordinador', 'coordinador.id', '=', 'carre.coordinador_user_id')
          ->join('users as tutor', 'tutor.id', '=', 'proyectos.tutor_user_id')
          ->select('proyectos.proyecto_id','codigo', 'anexo_estado', 'tomo', 'proyectos.tipo', 'proyectos.tutor_user_id', 'tutor.tipo_identificacion as tipo_identificacion_tutor', 'tutor.numero_identificacion as numero_identificacion_tutor', 'tutor.nombre as nombres_tutor', 'tutor.apellido as apellidos_tutor', 'autor.tipo_identificacion as tipo_identificacion_autor', 'autor.numero_identificacion as numero_identificacion_autor', 'autor.nombre as nombres_autor', 'autor.apellido as apellidos_autor', 'coautor.tipo_identificacion as tipo_identificacion_coautor','coautor.id as id_coautor', 'coautor.numero_identificacion as numero_identificacion_coautor', 'coautor.nombre as nombres_coautor', 'coautor.apellido as apellidos_coautor', 'carre.id as carrera_id', 'carre.name as carrera','carre.acronimo as acronimo', 'coordinador.id as coordinador_user_id', 'coordinador.nombre as nombres_coordinador', 'coordinador.apellido as apellidos_coordinador', 'titulo', 'resumen', 'anexo', 'tomo2', 'proyectos.created_at', 'proyectos.tipo as tipo')
          ->where('proyectos.proyecto_id', $id)
          ->first();

      $decano = Decano::first();

      // dd($proyecto->numero_identificacion_autor);

      $periodo = Periodos::where('estado','en curso')
      ->first();

      $pdf = PDF::loadView('vendor.adminlte.pdf.cartadecano', compact('proyecto', 'periodo', 'decano'))->setPaper('letter','portrait');
      return $pdf->stream('Carta aprobacion Decaco.pdf');
    }

    public function invitacionJurado($id)
    {
      $proyecto = Proyectos::join('carreras as carre', 'carre.id', '=', 'proyectos.carrera_id')
      // ->join('proyectos_estados', 'proyectos_estados.proyecto_estado_id', '=', 'proyectos.proyecto_estado_id')
      ->join('users as autor', 'autor.id', '=', 'proyectos.user_id')
      ->join('users as coautor', 'coautor.id', '=', 'proyectos.second_user_id')
      ->join('users as coordinador', 'coordinador.id', '=', 'carre.coordinador_user_id')
      ->join('users as tutor', 'tutor.id', '=', 'proyectos.tutor_user_id')
      ->select('proyectos.proyecto_id','codigo', 'anexo_estado', 'tomo', 'proyectos.tipo', 'proyectos.tutor_user_id', 'tutor.tipo_identificacion as tipo_identificacion_tutor', 'tutor.numero_identificacion as numero_identificacion_tutor', 'tutor.nombre as nombres_tutor', 'tutor.apellido as apellidos_tutor', 'tutor.telefono as telefono_tutor', 'autor.tipo_identificacion as tipo_identificacion_autor', 'autor.numero_identificacion as numero_identificacion_autor', 'autor.nombre as nombres_autor', 'autor.apellido as apellidos_autor', 'coautor.tipo_identificacion as tipo_identificacion_coautor','coautor.id as id_coautor', 'coautor.numero_identificacion as numero_identificacion_coautor', 'coautor.nombre as nombres_coautor', 'coautor.apellido as apellidos_coautor', 'carre.id as carrera_id', 'carre.name as carrera','carre.acronimo as acronimo', 'coordinador.id as coordinador_user_id', 'coordinador.nombre as nombres_coordinador', 'coordinador.apellido as apellidos_coordinador', 'titulo', 'resumen', 'anexo', 'tomo2', 'proyectos.created_at', 'proyectos.tipo as tipo')
      ->where('proyectos.proyecto_id', $id)
      ->first();

      // dd($proyecto->numero_identificacion_autor);
      $fecha = Calendario::where('proyecto_id', $id)
      ->first();
      // dd($fecha);
      $jurado = ProyectoJurados::join('users as  presidente', 'presidente.id', '=', 'proyecto_jurados.presidente_user_id')
      ->join('users as miembro1', 'miembro1.id', '=', 'proyecto_jurados.miembro1_user_id')
      ->join('users as miembro2', 'miembro2.id', '=', 'proyecto_jurados.miembro2_user_id')
      ->select('proyecto_jurado_id','presidente.id as presidente', 'presidente.nombre as nombres_presidente', 'presidente.apellido as apellidos_presidente', 'miembro1.nombre as nombres_miembro1', 'miembro1.apellido as apellidos_miembro1', 'miembro2.nombre as nombres_miembro2', 'miembro2.apellido as apellidos_miembro2', 'presidente.email as correo_presidente', 'miembro1.email as correo_miembro1', 'miembro2.email as correo_miembro2')
      ->where('proyecto_id', $id)
      ->first();
      // dd($proyecto);

      $periodo = Periodos::where('estado','en curso')
      ->first();

      $pdf = PDF::loadView('vendor.adminlte.pdf.invitacionjurado', compact('proyecto', 'periodo', 'jurado', 'fecha'))->setPaper('letter','portrait');
      return $pdf->stream('Carta Invitacion Jurado.pdf');

    }

    public function criteriop()
    {
      $pdf = PDF::loadView('vendor.adminlte.pdf.criterio-pasantia')->setPaper('letter','portrait');
      return $pdf->stream('Criterio de evaluacion.pdf');
    }
    public function criteriot()
    {
      $pdf = PDF::loadView('vendor.adminlte.pdf.criterio-grado')->setPaper('letter','portrait');
      return $pdf->stream('Criterio de evaluacion.pdf');
    }

    public function cartaap($id)
    {
      $proyecto = Proyectos::where('proyecto_id',$id)
      ->first();
      // dd($proyecto);
      $pdf = PDF::loadView('vendor.adminlte.pdf.aprobacion',compact('proyecto'))->setPaper('letter','portrait');
      return $pdf->stream('acta de aprobacion.pdf');
    }
}
