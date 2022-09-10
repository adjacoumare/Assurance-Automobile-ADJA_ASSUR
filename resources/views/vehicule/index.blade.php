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
  <h2>LISTE DES VEHICULES</h2>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/vehicules/create')}}" id="btn1">AJOUTER UN VEHICULE</a></div>
  <table class="table table-bordered table-hover " style="color:black; width:100%;">
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
          <td colspan="4">Actions</td>
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
                  <td><a href="{{ ('/myPDF')}}" class="btn btn-secondary">Attestation</a></td>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/home')}}" id="btn2">RETOUR</a></div>
<div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

@endsection


