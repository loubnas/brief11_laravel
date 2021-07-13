@extends('layouts.app')

@section('content')
<div class="container col-12">
    <div class="row">
      <div class="col-4 text-center">
            <img src="{{asset($film->image)}}" style="width: 350px" alt="" srcset="">
      </div>

      <div class="col-8">
        <h2 >{{$film->titre}}</h2>
        <h4>{{$film->datePub}}</h4>
        @auth
      <div class="input-group mt-3  col-10">
      <form action="{{route('commentaire.store')}}" class="d-flex justify-content-center" method="post" >
            @csrf

          <input type="hidden" name="id" value="{{$film->id}}">
        <div style="display:flex; flex-direction:column;">
            <input type="text" class="form-control" name="message"> 
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <div class="display:flex; flex-direction :row;">
            <input class="btn-lg btn-info " type="submit" style="margin-top:40px;margin-bottom:20%" value="Ajouter">
            <!-- <input class="btn-lg btn-primary" type="submit" style="margin-top:35px" value="Modifier">
            <input class="btn-lg btn-danger" type="submit" style="margin-top:35px" value="Supprimer"> -->
            </div>
        </div>
 

      </form>
        
         
      </div>
      @endauth

     
    <table class="table">
  <thead>
    <tr>
      <th scope="col">commentaire</th>
      <th scope="col">action</th>
    
    </tr>
  </thead>
  <tbody>
 
  @foreach ($film->commontaires() as $commentaire)
    <tr>
      <th scope="row">{{$commentaire->text}}</th>
      <td>
      @auth
      @if ($commentaire->user_id==Auth::user()->id)
        <form action="{{route('commentaire.destroy',$commentaire->id)}}" method="post">
            <a href="{{route('commentaire.edit',$commentaire->id)}}"  class="btn btn-lg btn-primary">Editer</a>@csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-lg btn-danger">Supprimer</button>
        </form>
        @endif
         @endauth
     </td>

    </tr>
    @endforeach
  
  </tbody>
</table>




      <!-- <h2 style="margin-left:40%;margin-top:5%;">commentaire</h2>
        @foreach ($film->commontaires() as $commentaire)
          <div>
            <p class="pt-1 text-center" style="color: black">{{$commentaire->text}}</p>
          </div>
        @endforeach
       
      </div>
    </div>
  </div> -->
@endsection