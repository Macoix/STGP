<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ´$users = User::select('user_id', 'name', 'email');
        $users = User::where('estado','!=','eliminado')
        ->get();
        $roles = Roles::all();
        // dd($roles);
        return view('vendor.adminlte.user.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Roles::select('id','name')
      ->get();

      return view('vendor.adminlte.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $usuario = new User;
      $usuario->fill([
        'nombre' => $request['nombre'],
        'apellido' => $request['apellido'],
        'telefono' => $request['telefono'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'numero_identificacion' => $request['numero_documento'],
        'tipo_identificacion' => $request['tipo_documento'],
        'rol_id' => $request['rol'],
        'estado' => $request['estado']
      ]);
      //dd($usuario);
      $usuario->save();

      return redirect()->to(route('user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      $roles = Roles::select('id','name')
      ->get();

       return view('vendor.adminlte.user.show', compact('user','roles','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $roles = Roles::select('id','name')
      ->get();
      return view('vendor.adminlte.user.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
      $user->update([
        'nombre' => $request['nombre'],
        'apellido' => $request['apellido'],
        'telefono' => $request['telefono'],
        'email' => $request['email'],
        // 'password' => bcrypt($request['password']),
        'numero_identificacion' => $request['numero_documento'],
        'tipo_identificacion' => $request['tipo_documento'],
        'rol_id' => $request['rol'],
        'estado' => $request['estado']
      ]);
      //dd($user);
      $user->save();

      return redirect()->to('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $user->estado = 'eliminado';
      $user->update();

      return redirect()->route('user.index');
    }
}
