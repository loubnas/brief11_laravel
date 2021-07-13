@extends('layouts.app')

@section('content')


<td><a href="{{route('film.create')}}" class="btn ml-4 btn-lg btn-dark">Ajouter</a> <br><br>
<table class="table text-center">

  <thead>
    <tr>
      <th scope="col">Titre</th>
      <th scope="col">Image</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($films as $film)
    <tr>

      <th scope="col-ml-4">{{$film->titre}}</th>
      <td><img src='{{asset($film->image)}}' style="width:100px;"></td>
      <td>{{$film->datePub}}</td>
      
       <td><form action="{{route('film.destroy',$film->id)}}" method="post">
            <a href="{{route('film.edit',$film->id)}}"  class="btn btn-lg btn-primary">Editer</a>@csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-lg btn-danger">Supprimer</button>
        </form>
     </td>
    </tr>
@endforeach
  
  </tbody>
</table>






@endsection