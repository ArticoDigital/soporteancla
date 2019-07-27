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
        city::create([ 'providence'=>'Panamá.','municipio' => 'Panamá.' ]);
        city::create([ 'providence'=>'Veraguas','municipio' => 'Santiago de Veraguas' ]);
        city::create([ 'providence'=>'Los Santos.','municipio' => 'Las Tablas' ]);
        city::create([ 'providence'=>'Herrera','municipio' => 'Chitré' ]);
        city::create([ 'providence'=>'Darién','municipio' => ' La Palma' ]);
        city::create([ 'providence'=>'Colón','municipio' => 'Colón' ]);
        city::create([ 'providence'=>'Penonomé','municipio' => 'Penonomé' ]);
        city::create([ 'providence'=>'Chiriquí','municipio' => 'David' ]);
        city::create([ 'providence'=>'Bocas del Toro','municipio' => 'Bocas del Toro' ]);

    }
}
