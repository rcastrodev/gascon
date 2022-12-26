<?php

use App\Product;
use App\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id = Category::where('name', 'Elementos para boca de pozo')->first()->id;
        
        Product::create([
            'category_id'   => $category_id ,
            'name'          => 'TEE PRENSA CON ASAS'
        ]);

        Product::create([
            'category_id'   => $category_id ,
            'name'          => 'TEE PRENSA HERCULES'
        ]);

        Product::create([
            'category_id'   => $category_id ,
            'name'          => 'CÁMARA LUBRICADORA'
        ]);

        Product::create([
            'category_id'   => $category_id ,
            'name'          => 'DISPOSITIVO DE CORTE ECOLÓGICO'
        ]);

        Product::create([
            'category_id'   => $category_id ,
            'name'          => 'GRAMPA SOPORTE DE VASTAGO'
        ]);

        Product::create([
            'category_id'   => $category_id ,
            'name'          => 'TEE PRENSA INTEGRAL'
        ]);
    }
}
