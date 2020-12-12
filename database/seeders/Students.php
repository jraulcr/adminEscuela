<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //php artisan make:seeder Students
    //php artisan db:seed --class=Students

    public function run()
    {
        $dataStudents = [
            [
            //    'id' => 1,
                'nombre_id' => 'Antonio',
                'apellidos' => 'Pérez Ruiz',
                'fecha_nac' => '1970-02-28',
                'ciudad' => 'Tarragona',
                'escuela_id' => 'Colegio San Juan'
            ],
            [
            //    'id' => 2,
                'nombre_id' => 'María',
                'apellidos' => 'Esposito Gómez',
                'fecha_nac' => '1984-11-08',
                'ciudad' => 'Barcelona',
                'escuela_id' => 'Academia Santa Tecla'
            ],
            [
              //  'id' => 3,
                'nombre_id' => 'Ana',
                'apellidos' => 'López Milà',
                'fecha_nac' => '1979-02-15',
                'ciudad' => 'Reus',
                'escuela_id' => 'Colegio San Juan'
            ],
            [
            //    'id' => 4,
                'nombre_id' => 'Iñaki',
                'apellidos' => 'Goikoechea Aramburu',
                'fecha_nac' => '1980-09-10',
                'ciudad' => 'Cornellà',
                'escuela_id' => 'Academia Santa Tecla'
            ]
        ];

        DB::table('students')->insert($dataStudents);
    }
}
