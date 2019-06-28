@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header" style="background:#111A5A;color:#ffffff;">Dashboard</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          You are logged in!
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">

  <br><br><br>

  <div class="row">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="col-sm-12">

      @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
    </div>

    {{-- si je suis dans la page  public/admin  affiche moi les produits --}}

    @if(Request::url() === 'http://localhost/weFashion/public/admin')
    <div class="col-sm-12">
      <h1 style="font-size:30px;"class="display-3">Product</h1>
      <div style="margin-left:950px;">
        <a style="margin: 19px;" href="{{ route('admins.create')}}" class="btn btn-primary">New product</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>

            <td>Name</td>
            <td>category</td>
            <td>Price</td>
            <td>etat</td>

            <td colspan = 2>Details</td>
            <td colspan = 2>Actions</td>
          </tr>
        </thead>
        <tbody>



          @foreach($shops as $shop)
          <tr>

            <td>{{$shop->name}}</td>

            <td>{{$shop->categorie['name']}}</td>


            <td>{{$shop->price}}</td>

            <td>{{$shop->state}}</td>


            <td>
              <a href="" class="btn btn-primary">Details</a>
            </td>

            <td>
              <a href="{{ route('admins.edit',$shop->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>

              <form action="{{ route('admins.destroy', $shop->id)}}" method="post">
                @csrf
                @method('POST')
              <button onclick="deleted()"class="btn btn-danger " type="submit">Delete</button>

              </form>
            </td>

            <script>
            function deleted(){
              alert('es tu sure de vouloir supprimer ce produit?');
            }
            </script>

          </tr>
          @endforeach

        </tbody>
      </table>


      {{--pagination sous laravel--}}
      {{$shops->links()}}

    </div>

    {{-- si je suis dans la page  public/categorie  affiche moi les categories --}}

    @elseif(Request::url() === 'http://localhost/weFashion/public/categorie')

    <div class="col-sm-12">
      <h1 style="font-size:30px;"class="display-3">Product</h1>
      <div style="margin-left:950px;">
        <a style="margin: 19px;" href="{{ route('admins.createCategorie')}}" class="btn btn-primary">New Categorie</a>
      </div>
      <table class="table table-striped">
        <thead>


          <tr>
            <td>ID</td>
            <td>Name</td>
            <td colspan = 2>Details</td>
            <td colspan = 2>Actions</td>


          </tr>

        </thead>
        <tbody>



          @foreach($shops as $shop)
          <tr>

            <td>{{$shop->id}}</td>

            <td>{{$shop->name}}</td>

            <td>
              <a href="" class="btn btn-primary">Details</a>
            </td>

            <td>
              <a href="{{ route('admins.editCategorie',$shop->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>

              <form action="{{ route('admins.destroyCategorie', $shop->id)}}" method="post">
                @csrf
                @method('POST')
                <button onclick="deleted()"class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>

            <script>
            function deleted(){
              alert('es tu sure de vouloir supprimer cette categorie?');
            }
            </script>

          </tr>
          @endforeach

        </tbody>
      </table>


    </div>
    @endif



    @endsection
