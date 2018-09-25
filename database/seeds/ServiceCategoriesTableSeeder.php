<?php

use Illuminate\Database\Seeder;
use App\ServiceCategory;
class ServiceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ServiceCategory::create([
            'name'=>'Transportadora valores',
            'description'=>'Descripcíón o ayuda del servicio',
            'isActive' => 1
        ]);

        ServiceCategory::create([
            'name'=>'Soporte cajas inteligentes',
            'description'=>'Descripcíón o ayuda del servicio',
            'isActive' => 1
        ]);

        ServiceCategory::create([
            'name'=>'Cajas fuertes',
            'description'=>'Descripcíón o ayuda del servicio',
            'isActive' => 1
        ]);

        ServiceCategory::create([
            'name'=>'Solicitud de insumos',
            'description'=>'Descripcíón o ayuda del servicio',
            'isActive' => 1
        ]);
    }
}
