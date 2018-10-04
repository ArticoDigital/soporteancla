<?php

use Illuminate\Database\Seeder;
use App\Models\City;
class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        city::create([
            'region'=>'Región Eje Cafetero - Antioquia',
            'codigo_dane_depto'=>'5',
            'departamento' => 'Antioquia',
            'codigo_dane_mun' => '5002',
            'municipio'=> 'Abejorral'
        ]);
        city::create([
            'region'=>'Región Centro Oriente',
            'codigo_dane_depto'=>'54',
            'departamento' => 'Norte de Santander',
            'codigo_dane_mun' => '54003',
            'municipio'=> 'Abrego'
        ]);
        	


    }
}
