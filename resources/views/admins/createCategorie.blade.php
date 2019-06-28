@extends('layouts.app')

@section('main')
<div class="row">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    {{--Formulaire de creation d'une nouvelles  categorie--}}
      <form method="post" action="{{ route('admins.storeCategorie')}}">
        @csrf
        @method('PATCH')

          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="category"/>
          </div>

          <button type="submit" class="btn btn-primary">Add category</button>
      </form>
  </div>
</div>
</div>
@endsection
