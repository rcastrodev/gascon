<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['name' => 'inicio']);
        Page::create(['name' => 'empresa']);
        Page::create(['name' => 'clientes']);
        Page::create(['name' => 'representantes']);
        Page::create(['name' => 'oficinas']);
        Page::create(['name' => 'novedades']);
        Page::create(['name' => 'calidad']);
        Page::create(['name' => 'encuesta']);
        Page::create(['name' => 'presupuesto']);
        Page::create(['name' => 'contacto']);
    }
}
