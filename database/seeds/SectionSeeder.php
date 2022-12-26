<?php

use App\Page;
use App\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home */
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'inicio')->first()->id, 'name' => 'section_2']);

        /** Empresa */
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_3']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_4']);
        Section::create(['page_id' => Page::where('name', 'empresa')->first()->id, 'name' => 'section_5']);

        /** Clientes */ 
        Section::create(['page_id' => Page::where('name', 'clientes')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'clientes')->first()->id, 'name' => 'section_2']);

        /** Representantes */ 
        Section::create(['page_id' => Page::where('name', 'representantes')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'representantes')->first()->id, 'name' => 'section_2']);

        /** Oficinas */ 
        Section::create(['page_id' => Page::where('name', 'oficinas')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'oficinas')->first()->id, 'name' => 'section_2']);

        /** Novedades */ 
        Section::create(['page_id' => Page::where('name', 'novedades')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'novedades')->first()->id, 'name' => 'section_2']);

        /** Calidad */ 
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_1']);
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_2']);
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_3']);
        Section::create(['page_id' => Page::where('name', 'calidad')->first()->id, 'name' => 'section_4']);

        /** Encuesta */ 
        Section::create(['page_id' => Page::where('name', 'encuesta')->first()->id, 'name' => 'section_1']);
    }
}
