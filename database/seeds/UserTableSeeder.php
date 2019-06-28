<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //creation de l'utilisateur admin
        DB::table('uers')->insert([
          'name'=>'admin',
          'email'=>'diamilesarr2006@gmail.com',
          'password'=>Hash::make('admin')
        ]);
    }
}
