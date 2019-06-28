<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
       //ici j'ai crée la table produit en creant aussi ses colones
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->Text('description');
            $table->decimal('price');
            $table->string('size')->default();
            $table->mediumText('image');
            $table->boolean('is_visible');
            $table->string('state');
            $table->string('reference',16);

            //$table->string('name_category');

            //ici je lie la produit à la table categorie grace à categorie qui se trouve à la colonne produit
            $table->Integer('categorie_id')->unsigned()->nullable();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      //cette fonction sera appelée quand on rollback on fresh --seed 
        Schema::dropIfExists('produits');
    }
}
