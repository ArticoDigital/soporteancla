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
        city::create([ 'region'=>'Panamá.','municipio' => 'Panamá.' ]);
        city::create([ 'region'=>'Veraguas','municipio' => 'Santiago de Veraguas' ]);
        city::create([ 'region'=>'Los Santos.','municipio' => 'Las Tablas' ]);
        city::create([ 'region'=>'Herrera','municipio' => 'Chitré' ]);
        city::create([ 'region'=>'Darién','municipio' => ' La Palma' ]);
        city::create([ 'region'=>'Colón','municipio' => 'Colón' ]);
        city::create([ 'region'=>'Penonomé','municipio' => 'Penonomé' ]);
        city::create([ 'region'=>'Chiriquí','municipio' => 'David' ]);
        city::create([ 'region'=>'Bocas del Toro','municipio' => 'Bocas del Toro' ]);
        city::create([ 'region'=>'Penonomé','municipio' => 'Coclé' ]);


    }
}
