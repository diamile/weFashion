<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {

    //creation des categories

    App\Categorie::create([
      'name'=>'hommes',


    ]);

    App\Categorie::create([
      'name'=>'femmes',
    ]);

    App\Categorie::create([
      'name'=>'enfants',


    ]);


    //ici je dis à ma factory de creer 80 produits
    factory(App\Produit::class,80)->create()->each(function($produit){

      $produit->save();

    });


  }
}
