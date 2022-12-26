<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'Lincoln Nº 1441, Villa Maipú (1650) San Martín, Buenos Aires, Argentina',
            'email'         => 'info@gascon.com.ar',
            'phone1'        => '+541147559290|(054) 11-4755-9290',
            'phone2'        => '+541144413928|+54 (11) 4441-3928',
            'logo_header'   => 'images/data/logo_header.svg',
            'logo_footer'   => 'images/data/logo_footer.svg',
            'logo_footer2'   => 'images/data/logo_footer_2.svg',
            'logo_footer3'   => 'images/data/logo_footer_3.svg',
        ]);
         
    }
}
