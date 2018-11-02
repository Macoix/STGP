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
          'tipo_identificacion' => 'Cedula',
          'numero_identificacion' => '1234567891',
          'nombre' => 'Admin',
          'apellido' => '',
          'telefono' => '00000000000',
          'email' => 'admin@ejemplo.com',
          'password' => bcrypt('admin'),
          'estado' => 'activo',
          'rol_id' => 1
      ]);

      DB::table('carreras')->insert([
        ['name' => 'Computacion',
        'acronimo' => 'C',
        'coordinador_user_id' => '1',
        'estado' => 'activo',],
      [
        'name' => 'Civil',
        'acronimo' => 'L',
        'coordinador_user_id' => '1',
        'estado' => 'activo',]
      ]);

      DB::table('roles')->insert([
        ['name' => 'Administrador',
        'guard_name' => 'web',
        ],
      [
        'name' => 'Director',
        'guard_name' => 'web',
        ]
      ]);
    }
}
