<?php

use Illuminate\Database\Seeder;

class Carreras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
