<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodos;
use App\Carrera;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $periodos = Periodos::where('estado','!=','concluido')
      ->get();

      return view('vendor.adminlte.periodos.index', compact('periodos'));
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

      return view('vendor.adminlte.periodos.create', compact('carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $periodos = Periodos::where('estado', 'en curso')->get();

      $periodo = new Periodos;
      $periodo->fill([
        'facultad' => $request['facultades'],
        'ano' => $request['ano'],
        'periodo' => $request['periodo'],
        'estado' => $request['estado'],
      ]);
      $periodo->save();

      foreach($periodos as $periodo_viejo){
        $periodo_viejo->estado = 'concluido';
        $periodo_viejo->save();
      }
      return redirect()->route('periodos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
