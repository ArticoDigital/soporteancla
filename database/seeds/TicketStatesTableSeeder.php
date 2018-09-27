<?php

use Illuminate\Database\Seeder;
use App\Models\TicketState;

class TicketStatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        TicketState::create([
            'name'=>'Recibido',
            'description'=>'Descripcíón de estado',
            'isActive' => 1
        ]);

        TicketState::create([
            'name'=>'Asignado',
            'description'=>'Descripcíón de estado',
            'isActive' => 1
        ]);
        TicketState::create([
            'name'=>'En proceso',
            'description'=>'Descripcíón de estado',
            'isActive' => 1
        ]);
        TicketState::create([
            'name'=>'Finalizado',
            'description'=>'Descripcíón de estado',
            'isActive' => 1
        ]);
        TicketState::create([
            'name'=>'Eliminado',
            'description'=>'Descripcíón de estado',
            'isActive' => 1
        ]);

    }
}
