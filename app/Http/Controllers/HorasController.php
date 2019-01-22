<?php

namespace App\Http\Controllers;

use PDF;
use App\Tutores;
use App\HTutotes;
use Illuminate\Http\Request;

class HorasController extends Controller
{
    public function index()
    {
      $tutores = HTutotes::All();
      return view('vendor.adminlte.nomina.index', compact('tutores'));
    }

    public function update(Request $request, $id)
    {
      $tutores = HTutotes::where('user_id',$id)
      ->first();
      $tutores->horas = $request['horas'];
      $tutores->observaciones = $request['observaciones'];
      $tutores->update();

      $tuto = Tutores::where('id',$id)
      ->first();
      $tuto->escalafon = $request['escalafon'];
      $tuto->condicion = $request['condicion'];
      $tuto->update();

      return redirect()->route('nomina.index');
    }

    public function pdf(Request $request)
    {
      $jornada = $request['jornada'];
      $tutores = Htutotes::groupby('proyecto_id')
      ->get();
      // dd($tutores);

      $pdf = PDF::loadView('vendor.adminlte.pdf.nominatuto', compact('tutores','jornada'))->setPaper('letter','landscape');
      return $pdf->stream('Nomina_tutores.pdf');
    }
}
