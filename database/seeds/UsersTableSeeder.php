<?php

use Illuminate\Database\Seeder;
use App\User;
use \Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Support']);
        $user1 = User::create([
            'name' => 'Daniel Quintero',
            'email' => 'danielrqo@gmail.com',
            'password' => bcrypt('12345'),
            'identification' => '3523243',
            'company_name' => 'Compañia 1',
            'company_NIT' => '45345345'
        ]);
        $user1->assignRole('Admi');
        $user2 = User::create([
            'name' => 'Juan Ramos',
            'email' => 'juan2ramos@gmail.com',
            'password' => bcrypt('12345'),
            'identification' => '352324323',
            'company_name' => 'Compañia 2',
            'company_NIT' => '4215345345'
        ]);
        $user2->assignRole('Admin');
    }
}
