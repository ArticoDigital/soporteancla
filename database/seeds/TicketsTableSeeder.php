<?php

use Illuminate\Database\Seeder;
use App\Models\Ticket;
class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ticket::create([
            'name'=>'Usuario Contacto',
            'company'=>'Empresa 1',
            'cellphone'=>'2342342224',
            'email' => 'danielrqo@gmail.com',
            'subject' => 'Daño caja fuerte',
            'sap_number'=>'35345',
            'identification'=>'32434',
            'sell_point'=>'Centro',
            'operation_center'=>'5',
            'user_id'=>'1',
            'service_category_id'=>'1',
            'ticket_state_id'=>'1',
            'request'=>'Esta es la solicitud.'
        ]);

    }
}
