<?php

use Illuminate\Database\Seeder;
use \App\Models\Towns;

class TownsTableSeeder extends Seeder
{

    public function run()
    {
        Towns::create(['name' => 'San Felipe', 'city_id' => 1 ]);
        Towns::create(['name' => 'El Chorrillo', 'city_id' => 1 ]);
        Towns::create(['name' => 'Santa Ana', 'city_id' => 1 ]);
        Towns::create(['name' => 'Calidonia', 'city_id' => 1 ]);
        Towns::create(['name' => 'Curundú', 'city_id' => 1 ]);
        Towns::create(['name' => 'Ancón', 'city_id' => 1 ]);
        Towns::create(['name' => 'Bella Vista', 'city_id' => 1 ]);
        Towns::create(['name' => 'Bethania', 'city_id' => 1 ]);
        Towns::create(['name' => 'San Francisco', 'city_id' => 1 ]);
        Towns::create(['name' => 'Pueblo Nuevo', 'city_id' => 1 ]);
        Towns::create(['name' => 'Parque Lefevre', 'city_id' => 1 ]);
        Towns::create(['name' => 'Río Abajo', 'city_id' => 1 ]);
        Towns::create(['name' => 'Juan Díaz', 'city_id' => 1 ]);
        Towns::create(['name' => 'Las Cumbres', 'city_id' => 1 ]);
        Towns::create(['name' => 'Pacora', 'city_id' => 1 ]);
        Towns::create(['name' => 'Tocumen', 'city_id' => 1 ]);
        Towns::create(['name' => 'Pedregal', 'city_id' => 1 ]);
        Towns::create(['name' => 'Las Mañanitas', 'city_id' => 1 ]);
        Towns::create(['name' => 'San Martín', 'city_id' => 1 ]);
        Towns::create(['name' => '24 de Diciembre', 'city_id' => 1 ]);
        Towns::create(['name' => 'Chilibre', 'city_id' => 1 ]);
        Towns::create(['name' => 'Alcalde Díaz', 'city_id' => 1 ]);
        Towns::create(['name' => 'Ernesto Córdoba Campos y Caimitillo.', 'city_id' => 1 ]);
    }

}
