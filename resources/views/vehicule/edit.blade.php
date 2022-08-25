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
    Modifier un Vehicule
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

      <form method="post" action="{{ route('vehicules.update', $vehicule->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="immatriculation">Immatriculation :</label>
              <input type="text" class="form-control" name="immatriculation" value="{{ $vehicule->immatriculation }}"/>
          </div>

          <div class="form-group">
              <label for="marque">Marque :</label>
              <input type="text" class="form-control" name="marque" value="{{ $vehicule->marque }}"/>
          </div>

          <div class="form-group">
              <label for="modele">Modele :</label>
              <input type="text" class="form-control" name="modele" value="{{ $vehicule->modele }}"/>
          </div>

          <div class="form-group">
              <label for="couleur">Couleur :</label>
              <input type="text" class="form-control" name="couleur" value="{{ $vehicule->couleur }}"/>
          </div>

          <div class="form-group">
              <label for="carburant">Carburant :</label>
              <input type="text" class="form-control" name="carburant" value="{{ $vehicule->carburant }}"/>
          </div>

          <div class="form-group">
              <label for="type">Type :</label>
              <input type="text" class="form-control" name="type" value="{{ $vehicule->type }}"/>
          </div>

          <div class="form-group">
              <label for="id_assure">Id_proprietaire :</label>
              <input type="text" class="form-control" name="id_proprietaire" value="{{ $vehicule->id_proprietaire }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection