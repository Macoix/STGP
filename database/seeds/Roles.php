<?php

use Illuminate\Database\Seeder;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
