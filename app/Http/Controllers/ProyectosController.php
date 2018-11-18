<?php

namespace App\Http\Controllers;

use App\Periodos;
use App\Proyectos;
use App\Carrera;
use App\User;
use App\Tutores;
use App\Roles;
use App\ProyectoEstado;
use App\Comite;
use App\ProyectoJurados;
use App\ProyectoEvaluacionesComite;
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
      $proyectos = Proyectos::where('user_id',Auth::user()->id)
      ->orWhere('second_user_id',Auth::user()->id)
      ->get();

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

        $user = User::where('rol_id','3')
        ->get();

        // $roles = Roles::where('name','estudiante')
        // ->get();

        $tutores = Tutores::All();

        return view('vendor.adminlte.proyectos.create', compact('carreras','user','tutores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $codigo = '';

      $periodo = Periodos::where('estado', 'en curso')->first();

      $proyectos = Proyectos::where([
        ['carrera_id', $request['carrera']],
        ['periodo_id', $periodo->id],
      ])->get();

      if ($proyectos->count() == 0) {

        $codigo = '001';

      } else {

        $ultimo_proyecto = $proyectos->last();
        $ultimo_codigo = (int)$ultimo_proyecto->codigo;
        $ultimo_codigo += 1;
        $ultimo_codigo = (string)$ultimo_codigo;
        $digitos = str_split($ultimo_codigo);

        if (count($digitos) == 1) {
          $codigo = '00' . $ultimo_codigo;
        } elseif (count($digitos) == 2) {
          $codigo = '0' . $ultimo_codigo;
        } else {
          $codigo = $ultimo_codigo;
        }

      }

      $proyecto = Proyectos::create([
        'codigo' => $codigo,
        'periodo_id' => $periodo->id,
        'tipo' => $request['tipo'],
        'tutor_user_id' => $request['tutor'],
        'carrera_id' => $request['carrera'],
        'titulo' => $request['titulo'],
        'resumen' => $request['resumen'],
        'second_user_id' => $request['coautor'],
        'anexo_estado' => 'pendiente',
        'proyecto_estado_id' => 0,
        'user_id' => Auth::user()->id,
      ]);

      if($request->file('documento')) {
          $file = $request->file('documento');
          $file_ext = $file->extension();
          $file_name = str_replace('.pdf', '',$file->getClientOriginalName()).'_'.date("d-m-y").'.'.$file_ext;
          $request->file('documento')->storeAs('proyectos/anexos', $file_name);
          $proyecto->anexo = $file_name;
          $proyecto->update();
      }

      $proyecto_estado = new ProyectoEstado;
      $proyecto_estado->proyecto_id = $proyecto->proyecto_id;
      $proyecto_estado->nombre = 'anexo_pendiente';
      $proyecto_estado->user_id = Auth::user()->id;

      $proyecto_estado->save();

      $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
      $proyecto->save();

      return redirect()->route('proyectos.show',$proyecto->proyecto_id);
    }

    function details($id)
    {
        $proyecto = Proyectos::join('carreras as carre', 'carre.id', '=', 'proyectos.carrera_id')
            // ->join('proyectos_estados', 'proyectos_estados.proyecto_estado_id', '=', 'proyectos.proyecto_estado_id')
            ->join('users as autor', 'autor.id', '=', 'proyectos.user_id')
            ->join('users as coautor', 'coautor.id', '=', 'proyectos.second_user_id')
            ->join('users as coordinador', 'coordinador.id', '=', 'carre.coordinador_user_id')
            ->join('users as tutor', 'tutor.id', '=', 'proyectos.tutor_user_id')
            ->select('proyectos.proyecto_id', 'anexo_estado', 'tomo', 'proyectos.tipo', 'proyectos.tutor_user_id', 'tutor.tipo_identificacion as tipo_identificacion_tutor', 'tutor.numero_identificacion as numero_identificacion_tutor', 'tutor.nombre as nombres_tutor', 'tutor.apellido as apellidos_tutor', 'autor.tipo_identificacion as tipo_identificacion_autor', 'autor.numero_identificacion as numero_identificacion_autor', 'autor.nombre as nombres_autor', 'autor.apellido as apellidos_autor', 'coautor.tipo_identificacion as tipo_identificacion_coautor', 'coautor.numero_identificacion as numero_identificacion_coautor', 'coautor.nombre as nombres_coautor', 'coautor.apellido as apellidos_coautor', 'carre.id as carrera_id', 'carre.name as carrera', 'coordinador.id as coordinador_user_id', 'coordinador.nombre as nombres_coordinador', 'coordinador.apellido as apellidos_coordinador', 'titulo', 'resumen', 'anexo', 'tomo2', 'proyectos.created_at')
            ->where('proyectos.proyecto_id', $id)
            ->get();

        $estados = ProyectoEstado::join('users', 'users.id', '=', 'proyectos_estados.user_id')
            ->select('proyectos_estados.nombre', 'comentario', 'proyectos_estados.created_at', 'users.nombre as usuario_nombre', 'users.apellido as usuario_apellido')
            ->where('proyecto_id','=', $id)
            ->get();

        $comite = Comite::join('users', 'users.id', '=', 'comites.user_id')
            ->where('carrera_id', $proyecto[0]->carrera_id)
            ->get();

        $evaluaciones_comite = ProyectoEvaluacionesComite::join('users', 'users.id', '=', 'proyectos_evaluaciones_comite.user_id')
            ->select('users.id', 'nombre', 'apellido', 'veredicto', 'observaciones', 'proyectos_evaluaciones_comite.estado', 'proyectos_evaluaciones_comite.created_at')
            ->where('proyecto_id', $id)
            ->get();
            // dd($evaluaciones_comite);
        $jurados = ProyectoJurados::join('users as  presidente', 'presidente.id', '=', 'proyecto_jurados.presidente_user_id')
            ->join('users as miembro1', 'miembro1.id', '=', 'proyecto_jurados.miembro1_user_id')
            ->join('users as miembro2', 'miembro2.id', '=', 'proyecto_jurados.miembro2_user_id')
            ->select('proyecto_jurado_id','presidente.id as presidente', 'presidente.nombre as nombres_presidente', 'presidente.apellido as apellidos_presidente', 'miembro1.nombre as nombres_miembro1', 'miembro1.apellido as apellidos_miembro1', 'miembro2.nombre as nombres_miembro2', 'miembro2.apellido as apellidos_miembro2')
            ->where('proyecto_id', $id)
            ->get();

        return compact('proyecto', 'estados', 'comite', 'evaluaciones_comite', 'jurados');
        // , '
    }
    public function show($id)
    {
      $detalles = $this->details($id);

      $proyecto = $detalles['proyecto'];

      $estados = $detalles['estados'];

      $comite = $detalles['comite'];

      $evaluaciones_comite = $detalles['evaluaciones_comite'];
      // dd($evaluaciones_comite);
      $jurado = $detalles['jurados'];

      return view('vendor.adminlte.proyectos.show', compact('proyecto', 'estados', 'comite', 'evaluaciones_comite', 'jurado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $detalles = $this->details($id);

      $proyecto = $detalles['proyecto'];

      $estados = $detalles['estados'];

      $carreras = Carrera::where('estado', '!=', 'inactivo')
          ->get();

      $user = User::where('rol_id','3')
      ->get();

      $tutores = Tutores::All();

      return view('vendor.adminlte.proyectos.edit', compact('proyecto', 'estados', 'carreras', 'user', 'tutores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $proyecto = Proyectos::findOrFail($id);
      $proyecto->tipo = $request->tipo;
      $proyecto->carrera_id = $request->carrera;
      $proyecto->tutor_user_id = $request->tutor;
      $proyecto->titulo = $request->titulo;
      $proyecto->resumen = $request->resumen;
      if($request->file('documento')) {
          Storage::delete('proyectos/anexos/'.$proyecto->anexos);
          $file = $request->file('documento');
          $file_ext = $file->extension();
          $file_name = str_replace('.pdf', '',$file->getClientOriginalName()).'_'.date("d-m-y").'.'.$file_ext;
          $request->file('documento')->storeAs('proyectos/anexos', $file_name);
          $proyecto->anexo = $file_name;
          $proyecto->update();
      }
      $proyecto->update();

      $proyecto_estado = new ProyectoEstado;
      $proyecto_estado->proyecto_id = $proyecto->proyecto_id;
      $proyecto_estado->nombre = 'proyecto_modificado';
      $proyecto_estado->user_id = Auth::user()->id;
      $proyecto_estado->save();

      return redirect()->route('proyectos.show',$proyecto->proyecto_id);
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
    public function document2($document)
    {
        return Storage::response("proyectos/tomos1/$document");
    }
    public function document3($document)
    {
        return Storage::response("proyectos/tomos2/$document");
    }

    public function validacion_anexo(Request $request, $id)
    {
       // dd($id);
        $proyecto = Proyectos::where('proyecto_id',$id)
        ->first();
        // $proyecto = Proyectos::find($id);
        // dd($proyecto, $id);
        if($request->estado == 'aprobar'){
            $proyecto->anexo_estado = 'aprobada';

            $proyecto_estado = new ProyectoEstado;
            $proyecto_estado->proyecto_id = $id;
            $proyecto_estado->nombre = 'anexo_aprobado';
            $proyecto_estado->comentario = 'Ha sido aprobado el anexo';
            $proyecto_estado->user_id = Auth::user()->id;
            // dd($proyecto_estado->proyecto_id);
            // dd($proyecto_estado->id);
            $proyecto_estado->save();

            $proyecto_estado = new ProyectoEstado;
            $proyecto_estado->proyecto_id = $id;
            $proyecto_estado->nombre = 'pendiente_tomo1';
            $proyecto_estado->comentario = 'Pendiente por subida del tomo 1.';
            $proyecto_estado->user_id = Auth::user()->id;
            // dd($proyecto_estado->proyecto_id);

            // dd($proyecto_estado->id);
                    // $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
                    // dd($proyecto->proyecto_estado_id , $proyecto_estado->proyecto_estado_id);

            $proyecto_estado->save();

        }
        else {
            $proyecto->anexo_estado = 'rechazada';
            $proyecto_estado = new ProyectoEstado;
            $proyecto_estado->proyecto_id = $id;
            $proyecto_estado->nombre = 'anexo_rechazado';
            $proyecto_estado->comentario = $request['observaciones'];
            $proyecto_estado->user_id = Auth::user()->id;
            // $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
            $proyecto_estado->save();
        }
        // dd($proyecto, $id);

        $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
        // dd($proyecto->proyecto_estado_id , $proyecto_estado->proyecto_estado_id);
        $proyecto->update();

        return redirect()->route('proyectos.show',$id);
    }

    public function subirTomo1(Request $request, $id){

      // dd($id);
      $file = $request->file('documento');
        $file_ext = $file->extension();
      $file_name = str_replace('.pdf', '',$file->getClientOriginalName()).'_'.date("d-m-y").'.'.$file_ext;
      $request->file('documento')->storeAs('proyectos/tomos1', $file_name);

      $proyecto = Proyectos::where('proyecto_id',$id)->get();
      foreach($proyecto as $proye){
      //dd($proye);
      $proye->tomo_estado = 'pendiente';
      $proye->tomo = $file_name;
      $proye->update();
      }

      $proyecto_estado = new ProyectoEstado;
      $proyecto_estado->proyecto_id = $id;
      $proyecto_estado->nombre = 'pendiente_evaluacion_comite';
      $proyecto_estado->comentario = 'Pendiente por revision del comite.';
      $proyecto_estado->user_id = Auth::user()->id;
      // dd($proyecto_estado);
      $proyecto_estado->save();

      $proyecto[0]->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
      $proyecto[0]->update();
      return redirect()->route('proyectos.show',$id);
    }

    public function subirTomo2(Request $request, $id){

      // dd($id);
      $file = $request->file('documento2');
      $file_ext = $file->extension();
      $file_name = str_replace('.pdf', '',$file->getClientOriginalName()).'_'.date("d-m-y").'.'.$file_ext;
      $request->file('documento2')->storeAs('proyectos/tomos2', $file_name);

      $proyecto = Proyectos::where('proyecto_id',$id)->get();
      foreach($proyecto as $proye){
      //dd($proye);
      $proye->tomo2_estado = 'pendiente';
      $proye->tomo2 = $file_name;
      $proye->update();
      }

      $proyecto_estado = new ProyectoEstado;
      $proyecto_estado->proyecto_id = $id;
      $proyecto_estado->nombre = 'pendiente_asignacion_jurado';
      $proyecto_estado->comentario = 'Pendiente por la asignacion de jurados.';
      $proyecto_estado->user_id = Auth::user()->id;
      // dd($proyecto_estado);
      $proyecto_estado->save();

      $proyecto[0]->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
      $proyecto[0]->update();
      return redirect()->route('proyectos.show',$id);
    }

    public function veredicto(Request $request, $id)
    {
        $proyecto = Proyectos::findOrFail($id);
        // dd($request->veredicto);
        $proyecto->veredicto = $request->veredicto;
        $proyecto->update();

        $proyecto_estado = new ProyectoEstado;
        $proyecto_estado->proyecto_id = $id;
        if($request->veredicto == 'aprobado'){
            $proyecto_estado->nombre = 'aprobado_evaluacion_jurado';
        }
        elseif($request->veredicto == 'aprobado_observaciones'){
            $proyecto_estado->nombre = 'aprobado_observaciones_evaluacion_jurado';
        }
        else {
            $proyecto_estado->nombre = 'rechazado_evaluacion_jurado';
        }

        $proyecto_estado->user_id = Auth::user()->id;
        $proyecto_estado->save();

        $proyecto->proyecto_estado_id = $proyecto_estado->proyecto_estado_id;
        $proyecto->save();

        return redirect()->to('tablero/menu/proyectos/'.$id)->with($notification);
    }
}
