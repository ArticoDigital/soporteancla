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
        city::create([ 'region'=>'Bocas del Toro','municipio' => '' ]);
        city::create([ 'region'=>'Cocle','municipio' => '' ]);
        city::create([ 'region'=>'Colón','municipio' => '' ]);
        city::create([ 'region'=>'Chiriquí','municipio' => '' ]);
        city::create([ 'region'=>'Darién','municipio' => '' ]);
        city::create([ 'region'=>'Herrera','municipio' => '' ]);
        city::create([ 'region'=>'Los Santos.','municipio' => '' ]);
        city::create([ 'region'=>'Panamá.','municipio' => 'Panamá.' ]);
        city::create([ 'region'=>'Veraguas','municipio' => '' ]);
        city::create([ 'region'=>'Panama oeste','municipio' => '' ]);
    }
}
