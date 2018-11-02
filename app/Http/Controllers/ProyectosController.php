<?php

namespace App\Http\Controllers;

use App\Proyectos;
use App\Carrera;
use App\User;
use Illuminate\Http\Request;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $proyectos = Proyectos::All();

      return view('vendor.adminlte.proyectos.index', compact('proyectos'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proyectos  $proyectos
     * @return \Illuminate\Http\Response
     */
    public function show(proyectos $proyectos)
    {
        //
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
}
