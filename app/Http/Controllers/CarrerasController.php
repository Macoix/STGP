<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Carrera;
use App\Tutores;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::where('estado','!=','eliminado')
        ->paginate(5);

        return view('vendor.adminlte.carreras.index',compact('carreras'));
    }

    public function getTutores(Request $request,$id){
          if($request->ajax()){
            $tutores = Tutores::tutor($id);
            return response()->json($tutores);
          }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $profesores = User::select('id', 'nombre', 'apellido')
          ->where('rol_id', '!=', 5)
          ->get();

      return view('vendor.adminlte.carreras.create', compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $carreras = new Carrera;
      $carreras->fill([
        'nombre' => $request['nombre'],
        'acronimo' => $request['acronimo'],
        'coordinador_user_id' => $request['coordinador_id'],
        'estado' => $request['estado']
      ]);
      // dd($carreras);
      $carreras->save();

      return redirect()->to('carreras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {

      $profesores = User::select('id', 'nombre', 'apellido')
          ->where('rol_id', '!=', 5)
          ->get();

      return view('vendor.adminlte.carreras.edit', compact('carrera','profesores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
      $carrera->update([
        'nombre' => $request['nombre'],
        'acronimo' => $request['acronimo'],
        'coordinador_user_id' => $request['coordinador_id'],
        'estado' => $request['estado']
      ]);

      return redirect()->to('carreras');
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
