<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Usuario Uno',
            'email' => 'danielrqo@gmail.com',
            'password' => bcrypt('12345'),
            'identification'=>'3523243',
            'company_name'=>'Compañia 1',
            'company_NIT'=>'45345345'
        ]);
        User::create([
            'name'=>'Usuario Dos',
            'email' => 'danielrqos@gmail.com',
            'password' => bcrypt('12345'),
            'identification'=>'352324323',
            'company_name'=>'Compañia 2',
            'company_NIT'=>'4215345345'
        ]);
    }
}
