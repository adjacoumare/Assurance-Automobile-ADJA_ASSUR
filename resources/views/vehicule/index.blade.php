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

  #btn1{
    margin-right: 15%;
    margin-top: 2%;
  }

  #btn2{
    margin-right: 15%;
  }

</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <h2>LISTE DES VEHICULES</h2>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/vehicules/create')}}" id="btn1">AJOUTER UN VEHICULE</a></div>
  <table class="table table-bordered table-hover " style="color:black; width:80%;">
    <thead>
        <tr>
          <td>Id</td>
          <td>immatriculation</td>
          <td>Marque</td>
          <td>Modele</td>
          <!-- <td>Couleur</td>
          <td>Carburant</td>
          <td>Type</td> -->
          <td>Nom_proprietaire</td>
          <td colspan="3">Actions</td>
        </tr>
    </thead>

    <tbody>
        @foreach($vehicules as $vehicule)
        <tr>
            <td>{{$vehicule->id}}</td>
            <td>{{$vehicule->immatriculation}}</td>
            <td>{{$vehicule->marque}}</td>
            <td>{{$vehicule->modele}}</td>
            <!-- <td>{{$vehicule->couleur}}</td>
            <td>{{$vehicule->carburant}}</td>
            <td>{{$vehicule->type}}</td> -->
            <td>{{$vehicule->proprietaire->nom}} {{$vehicule->proprietaire->prenom}}</td>
            <td><a href="{{ route('vehicules.edit', $vehicule->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('vehicules.show', $vehicule->id)}}" class="btn btn-info">Details</a></td>
            <td>
                <form action="{{ route('vehicules.destroy', $vehicule->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/home')}}" id="btn2">RETOUR</a></div>
<div>
@endsection


