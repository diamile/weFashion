@extends('welcome')

@section('contents')

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="/weFashion/public"><h1 style="color:green;font-weight:bold;font-size:30px;">weFashion</h1></a>

      <a class="nav-item nav-link" href="/weFashion/public/soldes">SOLDES</a>


      <a class="nav-item nav-link" href="/weFashion/public/hommes">HOMMES</a>

      <a class="nav-item nav-link" href="/weFashion/public/femmes">FEMMES</a>

      <a class="nav-item nav-link" href="/weFashion/public/enfants">ENFANTS</a>


      <a class="nav-item nav-link" href="#"><div style="width:80px;height:80px;background:#ffffff;margin-left:500px;border-radius:50%;"></div></a>

    </div>
  </div>
</nav>


<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>
<!-- Custom styles for this template -->
<link href="album.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  {{-- <!-- <td><img src="{{asset('images/'.$products->image)}}" alt="image" width="100px" height="100px"></td> --> --}}
  <main role="main">

    <div class="album py-5 bg-light">
      <div class="container">


        {{-- si la page affichée correspond à la page hommes affiche moi le nombre de produit hommes--}}

        @if(Request::url() === 'http://localhost/weFashion/public/hommes')
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">stock produit hommes</span>
          <span class="badge badge-secondary badge-pill">{{$countMen}} {{'resultats'}}</span>
        </h4>

        {{-- si la page affichée correspond à la page femmes affiche moi le nombre de produit femmes--}}

        @elseif(Request::url() === 'http://localhost/weFashion/public/femmes')
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">stock produit femmes</span>
          <span class="badge badge-secondary badge-pill"> {{$countWomen}} {{'resultats'}}</span>
        </h4>

        {{-- si la page affichée correspond à la page soldes affiche moi le nombre de produit soldés--}}

        @elseif(Request::url() === 'http://localhost/weFashion/public/soldes')

        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">stock produit soldés</span>
          <span class="badge badge-secondary badge-pill">{{$countSolde}} {{'resultats'}}</span>
        </h4>

        {{-- si la page affichée correspond à la page enfants affiche moi le nombre de produit enfants--}}
        @elseif(Request::url() === 'http://localhost/weFashion/public/enfants')
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">stock produit enfants</span>
          <span class="badge badge-secondary badge-pill">{{$countChild}} {{'resultats'}}</span>
        </h4>

        {{-- si la page affichée correspond à la page d'accueil affiche moi le nombre de produits--}}

        @else
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Stock de produits:</span>
          <span class="badge badge-secondary badge-pill"> {{$counts}} {{'resultats'}}</span>
        </h4>


        @endif


        {{-- affichage de tous ma boutique--}}

        <div class="row">

          @foreach($products as $product)

          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ route('admins.ProductDescription',$product->id)}}">

                <img src="{{asset('images/'.$product->image)}}" alt="image" width="100%" height="350px">

                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">{{'name'}} : {{$product->name}}</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">{{'price'}}</span> : <span style="color:black;font-weight:bold">{{$product->price}}</span></button>

                    </div>

                  </div>
                </div>

                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      @if($product->state==="solde")

                      <button type="button" class="btn btn-sm btn-outline-secondary">{{$product->state}}</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">-75%</span></button>
                      @else
                      <button type="button" class="btn btn-sm btn-outline-secondary">{{$product->state}}</button>
                      {{--<button type="button" class="btn btn-sm btn-outline-secondary"><span style="color:red;font-weight:bold">Edit</span></button> --}}
                      @endif
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </a>
          </div>

          @endforeach



        </div>

      </div>
    </div>


    {{--pagination sous laravel--}}
    {{$products->links()}}

  </main>


  <div>

  </div>

  <footer>
    @include('includes.footer')
  </footer>
  @endsection
