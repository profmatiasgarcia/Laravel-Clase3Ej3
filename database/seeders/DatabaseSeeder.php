<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();
        $this->call(CategoriaTableSeeder::class);
    }
}

class CategoriaTableSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['nombre' => 'MONITORES']);
        Categoria::create(['nombre' => 'TECLADO/MOUSE']);
        Categoria::create(['nombre' => 'ALMACENAMIENTO']);
        Categoria::create(['nombre' => 'IMPRESORAS']);
    }
}
