<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Illuminate\Support\Facades\DB;
use App\Categorie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   //fonction me permet d'afficher la liste des produits
    public function index()
    {
        $products= Produit::orderBy('id','DESC')->paginate(6);
        $results= Produit::all();
        $counts=$results->count();
      return view('admins.product',compact('products','counts'));

    }

    //la fonction ShowMen permet d'afficher tous les produits de categorie hommes
    public function ShowMen(){
      $hommes=DB::table('produits')->where('categorie_id','=',1)->orderBy('id','DESC')->paginate(6);

      $results=DB::table('produits')->where('categorie_id','=',1);
      $countMen=$results->count();

      return view('admins.product',['products'=>$hommes],compact('countMen'));

    }

   //la fonction ShowWomen permet d'afficher tous les produits de categorie femmes

    public function ShowWomen(){

      $femmes=DB::table('produits')->where('categorie_id','=',2)->orderBy('id','DESC')->paginate(6);
      $results=DB::table('produits')->where('categorie_id','=',1);
      $countWomen=$results->count();

      return view('admins.product',['products'=>$femmes],compact('countWomen'));

    }


   //la fonction ShowProductSolde permet d'afficher tous les produits soldés

    public function ShowProductSolde(){
      $soldes=DB::table('produits')->where('state','=','solde')->orderBy('id','DESC')->paginate(6);
      $results=DB::table('produits')->where('state','=','solde');
      $countSolde=$results->count();
        return view('admins.product',['products'=>$soldes],compact('countSolde'));
    }

 //la fonction ShowChildren permet d'afficher tous les produits de categorie enfant

    public function ShowChildren(){
      $enfants=DB::table('produits')->where('categorie_id','=',3)->orderBy('id','DESC')->paginate(6);
      $results=DB::table('produits')->where('categorie_id','=',3);
      $countChild=$results->count();
      return view('admins.product',['products'=>$enfants],compact('countChild'));

    }

   //la fonction productDescribe permet d'afficher des informations sur un produit
    public function productDescribe($id){

     $showProduct=Produit::find($id);

     return view('admins.ProductDescription',compact('showProduct'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
