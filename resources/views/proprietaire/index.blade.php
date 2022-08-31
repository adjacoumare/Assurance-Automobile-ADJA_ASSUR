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

  #adja{
    margin-left: 40%;
    color: white;
    font-weight: bold;
  }

  .modal-header{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    color: white;
    background-color: #4e73df;
  }
  
</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <h2>LISTE DES PROPRIETAIRES</h2>
    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalassué">AJOUTER PROPRIETAIRE</button>
    </div>
    <!-- debut modal ajout proprietaire -->
    <div class="modal fade" id="modalassué" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">AJOUTER PROPRIETAIRE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
          <form method="post" action="{{ route('proprietaires.store') }}">
         @csrf
          <div class="form-group">
              <label for="nom">Nom:</label>
              <input type="text" class="form-control" name="nom" placeholder="Veuillez entrer le nom"/>
          </div>

          <div class="form-group">
              <label for="prenom">Prenom:</label>
              <input type="text" class="form-control" name="prenom" placeholder="Veuillez entrer le prenom"/>
          </div>

          <div class="form-group">
              <label for="adresse">Adresse:</label>
              <input type="text" class="form-control" name="adresse" placeholder="Veuillez entrer l'adresse"/>
          </div>

          <div class="form-group">
              <label for="telephone">Telephone:</label>
              <input type="text" class="form-control" name="telephone" placeholder="Veuillez entrer le numero"/>
          </div>

          <div class="form-group">
              <label for="fonction">Fonction:</label>
              <input type="text" class="form-control" name="fonction" placeholder="Veuillez entrer la fonction"/>
          </div>
          <button type="submit" class="btn btn-primary" id="adja">Ajouter</button>
          </form>

            </div>
        
        </div>
        </div>
    </div>
    <!-- fin modal ajout proprietaire -->
  <!-- <div class="d-flex justify-content-end mb-4"><a type="button" class="btn btn-primary" href="{{('/proprietaires/create')}}">AJOUTER UN PROPRIETAIRE</a></div> -->
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

@endsection
