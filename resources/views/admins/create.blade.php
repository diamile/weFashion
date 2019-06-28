@extends('layouts.app')

@section('main')
<div class="row">


 <div class="col-sm-8 offset-sm-2">
    <h2 style="text-align:center" class="display-3">Add product</h2>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif


     {{-- Formulaire de creation de nouveaux produits --}}

    <div class="container">

      <div>
          <a style="float:right;" href="{{ route('admins.create')}}" class="btn btn-primary">New Product</a>
       </div>
   <br><br>
    <div class="jumbotron">

            <form method="post" action="{{ route('admins.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="couleur">description:</label>
                    <input type="text" class="form-control" name="description"/>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" min="150" max="600.00" step="100.00"/>
                </div>


                <div class="form-group">
                    <select id="size" name='size'>
                    <option value="XS">XS</option>
                    <option value="S" selected>S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                   </select>
                </div>



                <div class="form-group">
                    <select id="status" name="status">
                    <option value="0">non publié</option>
                    <option value="1" selected>publié</option>
                   </select>
                </div>


                <div class="form-group">
                    <select id="state" name="state">
                    <option value="standart" selected>standart</option>
                    <option value="solde">solde</option>
                   </select>
                </div>


                <div class="form-group">

                    <select id="category" name="categorie_id">
                      <option value="1">hommes</option>
                      <option value="2">femmes</option>
                      <option value="3">enfants</option>
                   </select>

                </div>

                <div class="form-group">
                    <label for="text">Reference:</label>
                    <input type="text" class="form-control" name="reference" />
                </div>


                <div class="input-group">

              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" placeholder="image">

                  <label class="custom-file-label">choose file</label>
              </div>

            </div>


                <button type="submit" class="btn btn-primary-outline">Add product</button>
            </form>

    </div>

    </div>

  </div>
</div>
</div>
@endsection
