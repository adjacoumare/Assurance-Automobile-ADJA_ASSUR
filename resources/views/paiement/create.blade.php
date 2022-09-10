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
    margin-top: 5%;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Effectuer un Paiement
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

      <form method="post" action="{{ route('paiements.store') }}">
         @csrf
          <div class="form-group">
              <label for="montant">Montant :</label>
              <input type="integer" class="form-control" name="montant" placeholder="Veuillez entrez le montant"/>
          </div>

          <div class="form-group">
              <label for="date">Date :</label>
              <input type="date" class="form-control" name="date"/>
          </div>

          <div class="container">
            <label class="form-label" for="doa">Nom_proprietaire</label>
            <select class="form-select" style="color: black" aria-label="Default select example" name="id_proprietaire">
            @foreach ($proprietaires as $proprietaire)
                <option value="{{$proprietaire->id}}">{{$proprietaire->prenom}} {{$proprietaire->nom}}</option>
            @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Valider</button>
      </form>
  </div>
</div>
@endsection