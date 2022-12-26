<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Elementos para boca de pozo']);
        Category::create(['name' => 'Elementos para medición de caudal']);
        Category::create(['name' => 'Accesorios de cañeria']);
        Category::create(['name' => 'Poleas tipo QD']);
    }
}
