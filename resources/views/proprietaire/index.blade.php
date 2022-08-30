@extends('layouts.dashboard')
@section('adja')


<style>
  .uper {
    margin-top: 40px;
  }

  h2{
    text-align: center;
    color: black;
    font-weight: bold;
  }

  thead{
    text-align: center;
    background-color: #4e73df;
    color: white;
    font-weight: bold;
  }  
</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <h2>LISTE DES PROPRIETAIRES</h2>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/proprietaires/create')}}">AJOUTER UN PROPRIETAIRE</a></div>
  <table class="table table-bordered table-hover" style="color:black;">

    <thead>
        <tr>
          <td>Id</td>
          <td>Nom</td>
          <td>Prenom</td>
          <!-- <td>Adresse</td>
          <td>Telephone</td> -->
          <td>Fonction</td>
          <td colspan="3">Actions</td>
        </tr>
    </thead>

    <tbody>
        @foreach($proprietaires as $proprietaire)
        <tr>
          <td>{{$proprietaire->id}}</td>
          <td>{{$proprietaire->nom}}</td>
          <td>{{$proprietaire->prenom}}</td>
          <!-- <td>{{$proprietaire->adresse}}</td>
          <td>{{$proprietaire->telephone}}</td> -->
          <td>{{$proprietaire->fonction}}</td>
          <td><a href="{{ route('proprietaires.edit', $proprietaire->id)}}" class="btn btn-primary">Modifier</a></td>
          <td><a href="{{ route('proprietaires.show', $proprietaire->id)}}" class="btn btn-info">Details</a></td>
          <td>
            <form action="{{ route('proprietaires.destroy', $proprietaire->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/home')}}">RETOUR</a></div>
<div>
@endsection
