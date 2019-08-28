<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ServiceCategoriesTableSeeder::class);
         $this->call(ServiceSubcategoriesTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(TicketStatesTableSeeder::class);
         $this->call(TownsTableSeeder::class);
         //$this->call(TicketsTableSeeder::class);
         //$this->call(CommentsTableSeeder::class);
    }
}
