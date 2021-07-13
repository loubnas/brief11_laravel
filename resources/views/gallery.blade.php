@extends('layouts.app')
@section('content')
<div class="container col-12 d-flex justify-content-evenly " >
    <div class="row col-12 ">
        @foreach ($films as $film)
        <div class="col-lg-3 col-md-4  ">
            <div class=" card m-2" style="width: 18rem; height:212px;">
                <img src="{{asset($film->image)}}" style="width:100px;" class="card-img-top" alt="{{$film->image}}">
                <div class="card-body">
                  <h5 class="card-title">{{$film->titre}}</h5>
                  <h6 class="card-title">{{$film->datePub}}</h6>
                  <a href="{{route('commentaire.show',$film->id)}}" class="btn-lg btn-primary">Afficher</a>
                </div>
              </div>
          </div>
        @endforeach
    </div>
  </div>
@endsection