<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriaTableSeeder::class);
    }
}

class CategoriaTableSeeder extends Seeder {
    public function run()
    {
        Categoria::create(['nome' => 'Eletrônica']);
        Categoria::create(['nome' => 'Eletrodoméstico']);
        Categoria::create(['nome' => 'Brinquedo']);
        Categoria::create(['nome' => 'Esporte']);
        Categoria::create(['nome' => 'Roupa']);
    }
}