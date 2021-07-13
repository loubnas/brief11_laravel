@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('commentaire.update',$commentaire->id)}}" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Commentaire</label>
                <input type="text" name="text" class="form-control" value="{{$commentaire->text}}">
              </div>
              
              <button type="submit" class=" ml-7 btn-lg btn-success" style="margin-left:45%">UPDATE</button>

          </form>
      </div>
    </div>
  </div>
@endsection