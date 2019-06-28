@extends('layouts.app')

@section('main')
<br><br>
<div class="row">
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

          {{-- Formulaire d'edition des categories --}}

        <div class="container">
          <div class="jumbotron">

            <h2 style="font-size:20px;text-align:center;"class="display-3">Update category</h2>

            <form method="post" action="{{ route('admins.updateCategorie', $categories->id) }}">
              {{csrf_field()}}


                <label for="category" class="col-lg-2 control-label">Category</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="name" name="category" value="{{$categories->name}}">
                </div><br>
                <button type="submit" class="btn btn-primary">update</button>
            </form>

          </div>

        </div>



    </div>
</div>
@endsection
