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
  <div class="d-flex justify-content-end mb-3"><a type="button" class="btn btn-primary" href="{{('/paiements/create')}}">Effectuer un paiement</a></div>
  <table class="table table-bordered table-hover" style="color:black;">

    <thead>
        <tr>
          <td>Id</td>
          <td>Montant</td>
          <td>Date</td>
          <td>Nom_proprietaire</td>
          <td colspan="3">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($paiements as $paiement)
        <tr>
            <td>{{$paiement->id}}</td>
            <td>{{$paiement->montant}}</td>
            <td>{{$paiement->date}}</td>
            <td>{{$paiement->proprietaire->nom}} {{$paiement->proprietaire->prenom}}</td>
            <td><a href="{{ route('paiements.edit', $paiement->id)}}" class="btn btn-primary">Modifier</a></td>
            <td><a href="{{ route('paiements.show', $paiement->id)}}" class="btn btn-info">Details</a></td>
            <td>
                <form action="{{ route('paiements.destroy', $paiement->id)}}" method="post">
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

