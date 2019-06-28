<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  //Partie Produits ******************************************************

  // la fonction index qui me permet d'afficher tous mes produits
  public function index()
  {
    $shops = Produit::paginate(6);
    return view('admin', compact('shops'));

  }

  //la fonction create me permet d'afficher le formulaire de creation de nouveau produits
  public function create(){
    return view('admins.create');
  }


  // la fonction store qui permet de recuperer toutes les données saisis par l'utilisateur et de les
  // stocker dans la base de donnée:insertion des données dans la base

  public function store(Request $request)
  {
    $request->validate([
      'name'=>'required',
      'price'=>'required',
      'description'=>'required',
      'size'=>'required',
      'reference'=>'required',
      'state'=>'required',


    ]);

    $addProduct= new Produit;
    //$addCategorie= new Categorie;


    //recuperation des données saisis par l'utilisateur grace à $request et stockage dans la base de données
    $addProduct->name=$request->input('name');
    $addProduct->description=$request->input('description');
    $addProduct->price=$request->input('price');

    $addProduct->size=$request->input('size');
    $addProduct->is_visible=$request->input('status');
    $addProduct->reference=$request->input('reference');


    $addProduct->state=$request->input('state');

    $addProduct->categorie_id=$request->input('categorie_id');



    if($request->hasfile('image')){

      $file=$request->file('image');

      $extension=$file->getClientOriginalExtension(); // recupere l'extension

      $filename=time().'.'.$extension;

      $file->move('images',$filename);

      $addProduct->image=$filename;
    }

    //enregistrement
    $addProduct->save();

    //message de succes et redirection dans la page admin
    return redirect('/admin')->with('success','data saved');
  }

  //affichage de ma formulaire qui me permet de modifier mes données
  public function edit($id)
  {
    $editProduct = Produit::find($id);
    $editCategorie=Categorie::find($id);


    return view('admins.edit', compact('editProduct','editCategorie'));


  }


  //la fonction update me permet de recuprerer les données de ma table prouitd  entrées par l'utilisateur
  //et remplacer ses données dans la base de donnée: Modification  d'un produit

  public function update(Request $request, $id)
  {
    $request->validate([
      'name'=>'required',
      'price'=>'required',
      'description'=>'required',
      'state'=>'required',



    ]);

    $editProduct=Produit::find($id);


    // $editCategorie=Categorie::find($id);

  //recuperation des données saisis par l'utilisateur grace à $request et ensuite modification de ma base de données
    $editProduct->name=$request->input('name');
    $editProduct->description=$request->input('description');
    $editProduct->price=$request->input('price');
    $editProduct->description=$request->input('description');

    $editProduct->state=$request->input('state');

    $editProduct->categorie_id=$request->input('categorie_id');

    $editProduct->save();

    return redirect('/admin')->with('success', 'Contact updated!');
  }

  //la fonction destroy me permet de supprimer un produit specifique via son id
  public function destroy($id)
  {

    $deleteProduct = Produit::find($id);
    $deleteProduct->delete();

    return redirect('/admin')->with('success', 'product deleted!');

  }

  //la partie categorie *************************************************************


  //la fonction getCategorie me permet d'afficher toutes les informations de ma table categories
  public function getCategorie()

  {
    $categories = Categorie::paginate(6);

    return view('admin', ['shops'=>$categories]);

  }


  //la fonction createCategorie permet d'afficher la formulaire de de creation de nouvelles categories
  public function createCategorie()
  {
    return view('admins.createCategorie');
  }


  //la fonction storeCategorie qui permet de recuperer toutes les données de ma table categories saisis par l'utilisateur et de les
  // stocker dans la base de donnée:insertion des données dans la base
  public function storeCategorie(Request $request)
  {
    $storeCategorie= new Categorie;

    $storeCategorie->name=$request->input('category');


    //enregistrement
    $storeCategorie->save();

    //msg de succes
    return redirect('/categorie')->with('success','Categorie was created!');
  }



  //la fonction editCategorie  me permet d'afficher le formulaire de modification des categories
  public function editCategorie($id)
  {
    $showCategorie=Categorie::find($id);
    $categories=Categorie::find($id);
    return view('admins.editCategorie',compact('showCategorie','categories'));
  }


  //la foncction updateCategorie me permet de modifier mes données de la base de données
  //via les données saisis par l'utilisateur

  public function updateCategorie(Request $request, $id)

  {
    $categories= Categorie::find($id);
    //recuperation des données saisis par l'utilisateur grace à $request et remplacement dans les colones specifique de ma base de données
    $categories->name=$request->input('category');
    $categories->save();

    return redirect('/categorie')->with('success', 'Categorie updated Thank you');
  }


  //la fonction distroy categorie permet de supprimer un categorie specifique via son id
  public function destroyCategorie($id)
  {
    $deletedCategorie = Categorie::find($id);
    $deletedCategorie->delete();

    return redirect('/categorie')->with('success', 'product deleted!');
  }



}
