@extends('layouts.app')
@section('main')
<br><br><br>
<div class="container">
    <div class="col-sm-8 offset-sm-2">


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif

      {{-- Formulaire d'edition de produits--}}

        <div class="container">
        <div class="jumbotron">

            <h2 class="display-3">Update Product</h2>
          <form class="" method="post" action="{{ route('admins.update', $editProduct->id) }}" enctype="multipart/form-data">
              @csrf


              <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" name="name" value="{{ $editProduct->name }} "/>
              </div>


              <div class="form-group">
                  <label for="description">Description:</label>
                  <input type="text" class="form-control" name="description" value="{{ $editProduct->description }} "/>
              </div>



              <div class="form-group">
                  <label for="price">Price:</label>
                  <input type="number" class="form-control" id="price" name="price" min="100.00" max="500.00" step="100.00" value="{{ $editProduct->price }} "/>
              </div>




             <div class="form-group">

                 <select id="category" name="categorie_id">
                   <option value="1">hommes</option>
                   <option value="2">femmes</option>
                   <option value="3">enfants</option>
                </select>

             </div>


              <div class="form-group">

                  <select id="state" name="state" >
                    <option value="solde"  @if($editProduct->state=="solde") selected @endif>solde</option>
                    <option value="standart"  @if($editProduct->state=="standart") selected @endif>standart</option>
                 </select>
              </div>

              <button type="submit" class="btn btn-primary">update</button>
          </form>
        </div>

     </div>



    </div>
</div>
@endsection
