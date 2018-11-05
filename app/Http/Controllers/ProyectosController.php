<?php

namespace App\Http\Controllers;

use App\Proyectos;
use App\Carrera;
use App\User;
use App\ProyectoEstado;
use Illuminate\Http\Request;
use Auth;
use Storage;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::All();
      $proyectos = Proyectos::All();

      return view('vendor.adminlte.proyectos.index', compact('proyectos','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = Carrera::where('estado', '!=', 'inactivo')
            ->get();

        $user = User::where('rol_id',5)
        ->get();

        return view('vendor.adminlte.proyectos.create', compact('carreras','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $proyecto = new Proyectos;
      $proyecto->fill([
        'tipo' => $request['tipo'],
        'tutor_user_id' => $request['tutor'],
        'carrera_id' => $request['carrera'],
        'titulo' => $request['titulo'],
        'resumen' => $request['resumen'],
        'second_user_id' => $request['coautor'],
      ]);
      $proyecto->anexo_estado = 'pendiente';
      $proyecto->proyecto_estado_id = 0;
      $proyecto->user_id = Auth::user()->id;
      // $proyecto->save();
      if($request->file('documento')) {
          $file = $request->file('documento');
          $file_ext = $file->extension();
          $file_name = str_replace('.pdf', '',$file->getClientOriginalName()).'_'.date("d-m-y").'.'.$file_ext;
          $request->file('documento')->storeAs('proyectos/documentos', $file_name);
          $proyecto->documento = $file_name;
          // dd($proyecto );
          // $proyecto->update();
      }

      $proyecto_estado = new ProyectoEstado;
      $proyecto_estado->proyecto_id = $proyecto->id;
      $proyecto_estado->nombre = 'anexo_pendiente';
      $proyecto_estado->user_id = Auth::user()->id;
      // dd($proyecto_estado);
      // $proyecto_estado->save();

      $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
      $proyecto->save();

      return redirect()->route('proyectos.index');
    }

    function details($id)
    {
        $proyecto = Proyectos::join('carreras as carre', 'carre.id', '=', 'proyectos.carrera_id')
            // ->('proyectos_estados', 'proyectos_estados.id', '=', 'proyectos.proyecto_estado_id')
            ->join('users as autor', 'autor.id', '=', 'proyectos.user_id')
            ->join('users as coautor', 'coautor.id', '=', 'proyectos.second_user_id')
            ->join('users as coordinador', 'coordinador.id', '=', 'carre.coordinador_user_id')
            ->join('users as tutor', 'tutor.id', '=', 'proyectos.tutor_user_id')
            ->select('proyectos.proyecto_id', 'anexo_estado', 'tomo', 'proyectos.tipo', 'proyectos.tutor_user_id', 'tutor.tipo_identificacion as tipo_identificacion_tutor', 'tutor.numero_identificacion as numero_identificacion_tutor', 'tutor.nombre as nombres_tutor', 'tutor.apellido as apellidos_tutor', 'autor.tipo_identificacion as tipo_identificacion_autor', 'autor.numero_identificacion as numero_identificacion_autor', 'autor.nombre as nombres_autor', 'autor.apellido as apellidos_autor', 'coautor.tipo_identificacion as tipo_identificacion_coautor', 'coautor.numero_identificacion as numero_identificacion_coautor', 'coautor.nombre as nombres_coautor', 'coautor.apellido as apellidos_coautor', 'carre.id', 'carre.name as carrera', 'coordinador.id as coordinador_user_id', 'coordinador.nombre as nombres_coordinador', 'coordinador.apellido as apellidos_coordinador', 'titulo', 'resumen', 'documento', 'proyectos.created_at')
            ->where('proyectos.proyecto_id', $id)
            ->get();

        $estados = ProyectoEstado::join('users', 'users.id', '=', 'proyectos_estados.user_id')
            ->select('proyectos_estados.nombre', 'comentario', 'proyectos_estados.created_at', 'users.nombre as usuario_nombre', 'users.apellido as usuario_apellido')
            ->where('proyecto_id','=', $id)
            ->get();

        // $comite = Comite::join('users', 'users.user_id', '=', 'comite.user_id')
        //     ->where('programa_id', $proyecto[0]->programa_id)
        //     ->get();

        // $evaluaciones_comite = ProyectoEvaluacionComite::join('users', 'users.user_id', '=', 'proyectos_evaluaciones_comite.user_id')
        //     ->select('users.user_id', 'nombres', 'apellidos', 'gn_pts', 'tit_pts', 'prob_pts', 'mtr_pts', 'met_pts', 'aadm_pts', 'fe_pts', 'veredicto', 'recomendaciones', 'proyectos_evaluaciones_comite.estado', 'proyectos_evaluaciones_comite.created_at')
        //     ->where('proyecto_id', $id)
        //     ->get();

        // $jurados = ProyectoJurado::join('users as  presidente', 'presidente.user_id', '=', 'proyectos_jurados.presidente_user_id')
        //     ->join('users as miembro1', 'miembro1.user_id', '=', 'proyectos_jurados.miembro1_user_id')
        //     ->join('users as miembro2', 'miembro2.user_id', '=', 'proyectos_jurados.miembro2_user_id')
        //     ->select('proyecto_jurado_id','presidente.user_id as presidente', 'presidente.nombres as nombres_presidente', 'presidente.apellidos as apellidos_presidente', 'miembro1.nombres as nombres_miembro1', 'miembro1.apellidos as apellidos_miembro1', 'miembro2.nombres as nombres_miembro2', 'miembro2.apellidos as apellidos_miembro2', 'proyectos_jurados.estado')
        //     ->where('proyecto_id', $id)
        //     ->get();

        return compact('proyecto', 'estados');
        // , 'comite', 'evaluaciones_comite', 'jurados'
    }
    public function show($id)
    {
      $detalles = $this->details($id);

      $proyecto = $detalles['proyecto'];

      $estados = $detalles['estados'];

      // dd($proyecto);
      // dd($estados);

      return view('vendor.adminlte.proyectos.show', compact('proyecto', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit(proyectos $proyectos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proyectos $proyectos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function destroy(proyectos $proyectos)
    {
        //
    }

    public function document($document)
    {
        return Storage::response("proyectos/documentos/$document");
    }

    public function validacion_anexo(Request $request, $id)
    {
       // dd($id);
        $proyecto = Proyectos::where('proyecto_id',$id)
        ->first();

        if($request->estado == 'aprobar'){
            $proyecto->anexo_estado = 'aprobada';

            $proyecto_estado = ProyectoEstado::create([
              'proyecto_id' => $id,
              'nombre' => 'anexo_aprobado',
              'comentario' => 'Ha sido aprobado el anexo',
              'user_id' => Auth::user()->id,
            ]);
            // $proyecto_estado = new ProyectoEstado;
            // $proyecto_estado->proyecto_id = $id;
            // $proyecto_estado->nombre = 'anexo_aprobado';
            // $proyecto_estado->comentario = 'Ha sido aprobado el anexo';
            // $proyecto_estado->user_id = Auth::user()->id;
            // // dd($proyecto_estado->id);
            // $proyecto_estado->save();

            $proyecto_estado = ProyectoEstado::create([
              'proyecto_id' => $id,
              'nombre' => 'pendiente_evaluacion_comite',
              'comentario' => 'Pendiente por revision del comite.',
              'user_id' => Auth::user()->id,
            ]);
            // $proyecto_estado = new ProyectoEstado;
            // $proyecto_estado->proyecto_id = $id;
            // $proyecto_estado->nombre = 'pendiente_evaluacion_comite';
            // $proyecto_estado->comentario = 'Pendiente por revision del comite.';
            // $proyecto_estado->user_id = Auth::user()->id;
            // // dd($proyecto_estado->id);
            // $proyecto_estado->save();

        }
        else {
            $proyecto->anexo_estado = 'rechazada';
            $proyecto_estado = ProyectoEstado::create([
              'proyecto_id' => $id,
              'nombre' => 'anexo_rechazado',
              'comentario' => 'anexo rechazado',
              'user_id' => Auth::user()->id,
            ]);
        }
        $proyecto->proyecto_estado_id = $proyecto_estado->id;
        dd($proyecto_estado->id, $id, $proyecto, $proyecto_estado,$proyecto->proyecto_estado_id );

        $proyecto->save();

        return redirect()->route('proyectos.show',$id);
    }
}
