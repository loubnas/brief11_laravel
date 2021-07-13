@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('film.update',$film->id)}}" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" value="{{$film->titre}}">
              </div>

              <div class="mb-3">
              <label  class="form-label">Image</label>
              <input type="file" name="image" class="form-control" value="{{$film->image}}">
            </div>

              <div class="mb-3">
                <label  class="form-label">Date</label>
                <input type="date" name="datepub" class="form-control" value="{{$film->datePub}}" >
              </div>
              <button type="submit" class=" ml-7 btn-lg btn-success" style="margin-left:45%">UPDATE</button>

          </form>
      </div>
    </div>
  </div>
@endsection