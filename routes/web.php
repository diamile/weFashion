<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


//partie admin *******************************************************************

//route qui permet d'afficher tous mes produits avec la method get
Route::get('/admin', 'HomeController@index')->name('admin');

//route qui permet d'afficher la formulaire de creation de produits
Route::get('/creates', 'HomeController@create')->name('admins.create');

//Route qui permet d'appeler la fonction store qui recupere les recupere les données
//saisis par l'utilisateur et les stock dans la base de donnée
 Route::post('/admin', 'HomeController@store')->name('admins.store');

 //route qui me permet d'afficger la formulaire d'edition de produit grace à la fonction edit
  Route::get('/edit/{id}', 'HomeController@edit')->name('admins.edit');

  //route qui permet de modifier les données au niveau de ma base grace a la fonction update
  //qui recupere toutes les données saisis par l'utilisateur grace à $request  les remplacer dans la base de données
   Route::post('/update/{id}', 'HomeController@update')->name('admins.update');

//route qui me permet de supprimer une formulaire specifique grace à l'id qu'on recupere
 Route::post('/admins.destroy/{id}','HomeController@destroy')->name('admins.destroy');


//Partie categorie ***********************************************************************


//route qui permet d'afficher toutes les categories grace a la fonction getCategorie
  Route::get('/categorie', 'HomeController@getCategorie')->name('admins.categorie');


//route qui permet d'afficher la formulaire d'edition des categories
 Route::get('/editCategorie/{id}', 'HomeController@editCategorie')->name('admins.editCategorie');

 //route qui permet d'appeler directement ma fonction update afin de recuprerer les données saisis par l'utilisateurs et de remplacer dans
 //dans la base de donnée
 Route::post('/admins.updateCategorie/{id}', 'HomeController@updateCategorie')->name('admins.updateCategorie');

//route qui permet de suppprimer une catgorie specifique via son id
 Route::post('/admins.destroyCategorie/{id}','HomeController@destroyCategorie')->name('admins.destroyCategorie');

//route qui permet d'afficher la formulaire de creation de nouvelles categories
Route::get('/createCategorie','HomeController@createCategorie')->name('admins.createCategorie');

//route qui permet de stocker les données des categories saisis par l'utilisateur et de les inserer dans la base de données
Route::patch('/storeCategorie', 'HomeController@storeCategorie')->name('admins.storeCategorie');


//Route qui gere la Vue :ProductController*********************************************************************

//route qui permet l'affichage de tous les produits dans ma page d'accueil
Route::resource('/','ProductController');

//route qui permet d'afficher uniquement la page categorie homme
Route::get('/hommes','ProductController@ShowMen');

//route qui permet d'afficher uniquement la page categorie femme
Route::get('/femmes','ProductController@ShowWomen');

//route qui permet d'afficher uniquement les produits soldés
Route::get('/soldes','ProductController@ShowProductSolde');

//route qui permet d'afficher uniquement la categorie enfant
Route::get('/enfants','ProductController@ShowChildren');

//route qui permet d'afficher les informations liés à un  seul produits
Route::get('/hommes/{id}','ProductController@productDescribe')->name('admins.ProductDescription');
Route::get('/femmes/{id}','ProductController@productDescribe')->name('admins.ProductDescription');
Route::get('/enfants/{id}','ProductController@productDescribe')->name('admins.ProductDescription');
Route::post('/categorie.destroy/{id}','CategorieController@destroy')->name('categorie.destroy');



Auth::routes();
