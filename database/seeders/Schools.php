<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Schools extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan make:seeder Schools
    //php artisan db:seed --class=Schools
    public function run()
    {
        $dataSchools = [
            [
               // 'id' => 1,
                'nombre_id' => 'Colegio San Juan',
                'direccion' => 'Calle San Juan, 5',
                'logotipo' => 'url/carpeta/sanjuan.jpg',
                'email' => 'colegiosanjuan@yahoo.es',
                'telefono' => 977000000,
                'web' => 'www.colegiosanjuan.es'
            ],
            [
               // 'id' => 2,
                'nombre_id' => 'Academia Santa Tecla',
                'direccion' => 'Avenida de la llegada, 20',
                'logotipo' => 'url/carpeta/santatecla.jpg',
                'email' => 'academiasantatecla@gmail.com',
                'telefono' => 931111111,
                'web' => 'www.academiasantatecla.edu'
            ]
        ];

        DB::table('schools')->insert($dataSchools);
    }
}
