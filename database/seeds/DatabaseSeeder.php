<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

      DB::table('carreras')->insert([
        [
          'name' => 'Computacion',
          'acronimo' => 'C',
          'coordinador_user_id' => '1',
          'estado' => 'activo',
        ],
        [
          'name' => 'Civil',
          'acronimo' => 'L',
          'coordinador_user_id' => '1',
          'estado' => 'activo',
        ]
      ]);

      DB::table('roles')->insert([
        ['name' => 'Administrador',
          'guard_name' => 'web',
        ],
        [
          'name' => 'Director',
          'guard_name' => 'web',
        ],
        [
          'name' => 'Estudiante',
          'guard_name' => 'web'
        ],
      ]);

      DB::table('tutores')->insert([
        [
          'carrera_id' => 1,
          'user_id' => 1,
        ],
        [
          'carrera_id' => 2,
          'user_id' => 2,
        ],
      ]);

      DB::table('periodos')->insert([
        [
          'facultad' => 'FI',
          'ano' => '2018',
          'periodo' => '1',
          'estado' => 'en curso',
        ]
      ]);
    }
}
