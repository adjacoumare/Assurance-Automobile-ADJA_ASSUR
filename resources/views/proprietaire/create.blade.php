@extends('layouts.dashboard')
@section('adja')

<style>
  .uper {
    margin-top: 40px;
    width: 45%;
    margin-left: 25%;
    margin-bottom: 5%;
    color: black;
  }

  .card-header{
    text-align: center;
    text-transform: uppercase;
    font-weight: bold;
    color: white;
    background-color: #4e73df;
  }

  form{
    width: 100%;
    justify-content: center;
  }

  .btn{
    margin-left: 40%;
    color: white;
    font-weight: bold;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Ajouter un Proprietaire
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

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
          <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
  </div>
</div>
@endsection