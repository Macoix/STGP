<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutores;
use App\Carrera;
use App\User;

class TutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tutores = Tutores::All();
      $users = User::select('id', 'nombre', 'apellido')
          ->where('rol_id', '!=', 5)
          ->get();
      $carreras = Carrera::where('estado','!=','eliminado')
      ->get();

      return view('vendor.adminlte.tutores.index',compact('tutores', 'users','carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $carreras = Carrera::where('estado','!=','eliminado')
      ->get();

      $users = User::select('id', 'nombre', 'apellido')
          ->where('rol_id', '!=', 5)
          ->get();

      return view('vendor.adminlte.tutores.create', compact('carreras','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tutores = new Tutores;

      $tutores->fill([
        'carrera_id' => $request['carreraid'],
        'user_id' => $request['userid']
      ]);
      // dd($tutores);
      $tutores->save();
      return redirect()->route('tutor.index');
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
      $tutores = Tutores::where('id',$id)
      ->first();
      // dd($tutores);
      $tutores->carrera_id = $request['carreraid'];
      // dd($tutores->carrera_id);
      $tutores->save();
      return redirect()->route('tutor.index');
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
