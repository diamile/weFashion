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
      //ici j'appel la fonction call en lui donnant comme argument  ma seeder
     $this->call(ProductTableSeeder::class);

    }
}
