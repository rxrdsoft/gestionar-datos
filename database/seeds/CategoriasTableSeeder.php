<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = \App\Categoria::create([
           'nombre' => 'INDECOPI'
        ]);

        $categoria = \App\Categoria::create([
            'nombre' => 'REBOTES'
        ]);

        $categoria = \App\Categoria::create([
            'nombre' => 'BAJAS'
        ]);

        $categoria = \App\Categoria::create([
            'nombre' => 'QUEJAS'
        ]);

        $categoria = \App\Categoria::create([
            'nombre' => 'TERMINOLOGIA'
        ]);
    }
}
