<?php

use Illuminate\Database\Seeder;
use App\Models\ServiceSubcategory;
class ServiceSubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ServiceSubcategory::create([
            'name'=>'Subcategoria1',
            'description'=>'Descripcíón o ayuda del servicio',
            'service_category_id'=>1,
            'isActive' => 1
        ]);

        ServiceSubcategory::create([
            'name'=>'Subcatogria2_1',
            'description'=>'Descripcíón o ayuda del servicio',
            'service_category_id'=>2,
            'isActive' => 1
        ]);

        ServiceSubcategory::create([
            'name'=>'Subcategoria2_2',
            'description'=>'Descripcíón o ayuda del servicio',
            'service_category_id'=>2,
            'isActive' => 1
        ]);

        ServiceSubcategory::create([
            'name'=>'Subategoria3',
            'description'=>'Descripcíón o ayuda del servicio',
            'service_category_id'=>3,
            'isActive' => 1
        ]);
        ServiceSubcategory::create([
            'name'=>'Subcategoria4',
            'description'=>'Descripcíón o ayuda del servicio',
            'service_category_id'=>4,
            'isActive' => 1
        ]);
    }

}
