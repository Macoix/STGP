<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendario;
use App\Proyectos;
use App\Periodos;
use App\Carrera;
use PDF;


class CalendarioController extends Controller
{

    public function mostrar(){
      $periodo = Periodos::where('estado', 'en curso')
      ->first();

      if(isset($periodo) == 1){
      $proyectos = Proyectos::select('proyectos.periodo_id', 'proyectos.codigo','proyectos.carrera_id','proyectos.tipo', 'proyectos.proyecto_id')
      ->where('proyectos.periodo_id', $periodo->id)
      ->get();
    }else{
      $mensaje = 'Debe seleccionar un periodo como "en curso"';
    }
      // dd($proyectos);

      $carreras = Carrera::all();

      // dd($periodo);

      return view('vendor.adminlte.calendario.calendario', compact('proyectos','periodo','carreras', 'mensaje'));
    }
    public function create()
    {

      $title = $_POST['title'];
      $start = $_POST['start'];
      $back = $_POST['background'];
      $proyecto_id = $_POST['id'];

      $evento = new Calendario;
      $evento->fechaini = $start;
      $evento->todoeldia = true;
      $evento->color = $back;
      $evento->titulo = $title;
      $evento->proyecto_id = $proyecto_id;
      $evento->save();

      $proyecto = Proyectos::where('proyecto_id', $proyecto_id)
      ->first();

      $proyecto->calendario_id = $evento->id;
      $proyecto->save();
    }

    public function index()
    {
      $data = array();
      $id = Calendario::all()->pluck('id');
      $titulo = Calendario::all()->pluck('titulo');
      $fechaIni = Calendario::all()->pluck('fechaIni');
      $fechaFin = Calendario::all()->pluck('fechaFin');
      $allDay = Calendario::all()->pluck('todoeldia');
      $background = Calendario::all()->pluck('color');

      $count = count($id);

      for($i=0;$i<$count;$i++)
      {
        $data[$i] = array(
          'title'=>$titulo[$i],
          'start'=>$fechaIni[$i],
          'end'=>$fechaFin[$i],
          'allDay'=>$allDay[$i],
          'backgroundColor'=>$background[$i],
          'id'=>$id[$i]
        );
      }
      json_encode($data);
      return $data;
    }

    public function update()
    {
      $id = $_POST['id'];
      $title = $_POST['title'];
      $start = $_POST['start'];
      $end = $_POST['end'];
      $allDay = $_POST['allday'];
      $back = $_POST['background'];

      $evento = Calendario::find($id);
      if($end == 'null'){
        $evento->fechaFin = null;
      }else{
        $evento->fechaFin = $end;
      }
      if($allDay == false){
        $evento->todoeldia = 0;
      }else{
        $evento->todoeldia = 1;
      }
      $evento->fechaIni = $start;
      $evento->color = $back;
      $evento->titulo = $title;

      $evento->save();
    }

    public function delete()
    {
        $id = $_POST['id'];
        Calendario::destroy($id);
    }

    public function pdf(Request $request)
    {

    $proyectos = Proyectos::join('users as autor', 'autor.id', '=', 'proyectos.user_id')
    ->join('users as coautor', 'coautor.id', '=', 'proyectos.second_user_id')
    ->join('users as tutor', 'tutor.id', '=', 'proyectos.tutor_user_id')
    ->join('carreras as carre', 'carre.id','=','proyectos.carrera_id')
    ->join('calendarios as calen', 'calen.proyecto_id','=', 'proyectos.proyecto_id')
    ->select('proyectos.proyecto_id', 'tutor.nombre as nombres_tutor', 'tutor.apellido as apellidos_tutor', 'autor.numero_identificacion as numero_identificacion_autor', 'autor.nombre as nombres_autor', 'autor.apellido as apellidos_autor','coautor.id as coautor_id', 'coautor.numero_identificacion as numero_identificacion_coautor', 'coautor.nombre as nombres_coautor', 'coautor.apellido as apellidos_coautor', 'proyectos.titulo as titulo', 'calen.fechaIni as fecha_inicio','calen.titulo as calen_titulo', 'carre.id as carrera_id', 'carre.name as carrera_nombre')
    ->where('proyectos.carrera_id',$request['carrera'])
    ->get();
    // dd($proyectos);
    // $calendario = Calendario::all();

    $pdf = PDF::loadView('vendor.adminlte.pdf.agenda', compact('proyectos'))->setPaper('letter','landscape');
    return $pdf->stream('agenda.pdf');
    }
}
