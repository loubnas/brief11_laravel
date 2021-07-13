@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <form action="{{route('film.store')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Titre</label>
                <input type="text" name="titre" class="form-control" >
              </div>

              <div class="mb-3">
              <label  class="form-label">Image</label>
              <input type="file" name="image" class="form-control" >
            </div>
        
              <div class="mb-3">
                <label  class="form-label">Date</label>
                <input type="date" name="datepub" class="form-control" >
              </div>
                <button type="submit" class=" ml-7 btn-lg btn-success" style="margin-left:45%">Enregistrer</button>
          </form>
      </div>
    </div>
  </div>
@endsection