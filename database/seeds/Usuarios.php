<?php

use Illuminate\Database\Seeder;

class Usuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
            'tipo_identificacion' => 'Cedula',
            'numero_identificacion' => '1234567891',
            'nombre' => 'Admin',
            'apellido' => 'Moderador',
            'telefono' => '00000000000',
            'email' => 'admin@ejemplo.com',
            'password' => bcrypt('admin'),
            'estado' => 'activo',
            'rol_id' => 1
        ],
        [
            'tipo_identificacion' => 'Cedula',
            'numero_identificacion' => '372367',
            'nombre' => 'Enrique',
            'apellido' => 'Bermduez',
            'telefono' => '00000000000',
            'email' => 'enriquito@ejemplo.com',
            'password' => bcrypt('admin'),
            'estado' => 'activo',
            'rol_id' => 2,
        ],
        [
            'tipo_identificacion' => 'Cedula',
            'numero_identificacion' => '946164214',
            'nombre' => 'Macoix',
            'apellido' => 'Macoisini',
            'telefono' => '00000000000',
            'email' => 'elmacomaco@ejemplo.com',
            'password' => bcrypt('admin'),
            'estado' => 'activo',
            'rol_id' => 3,
        ]
      ]);
    }
}
