<form method="post" action="">
    <div class="container">
        <label class="form-label" for="doa">Id_Vehicule</label>
        <select class="form-select" style="color: #41A7A5" aria-label="Default select example" name="id_vehicule">
        @foreach ($vehicule as $vehicule)
            <option value="{{$vehicule->id}}">{{$vehicule->id}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="datedebut">Date_debut:</label>
        <input type="date" class="form-control" name="datedebut" placeholder="datedebut"/>
    </div>

    <div class="form-group">
        <label for="datefin">Date_fin:</label>
        <input type="date" class="form-control" name="datefin" placeholder="datefin"/>
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>