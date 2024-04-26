<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = new Categoria();
        $categoria->nombre = 'Deportes';
        $categoria->descripcion = 'Categoria de deportes';
        $categoria->activo = true;
        $categoria->save();

        $categoria2 = new Categoria();
        $categoria2->nombre = 'RPG';
        $categoria2->descripcion = 'Categoria de RPG';
        $categoria2->activo = true;
        $categoria2->save();

        $categoria3 = new Categoria();
        $categoria3->nombre = 'Aventura';
        $categoria3->descripcion = 'Categoria de aventura';
        $categoria3->activo = true;
        $categoria3->save();

        $categoria4 = new Categoria();
        $categoria4->nombre = 'Accion';
        $categoria4->descripcion = 'Categoria de accion';
        $categoria4->activo = true;
        $categoria4->save();
    }
}
