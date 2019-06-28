<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categorie;

class Produit extends Model
{
  protected $fillable=['name','description','price','size','reference','image','state'];
  //protected $primaryKey = 'id_category';

  public function categorie(){
     return $this->belongsTo(Categorie::class);
     //return $this->belongsTo('App\Categorie', 'category_id');
   }





   // public function picture(){
   //    return $this->hasOne(Produit::class);
   //  }

}
