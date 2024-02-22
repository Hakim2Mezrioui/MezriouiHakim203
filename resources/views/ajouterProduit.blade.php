<form action="/ajouter_produit_db" method="POST">
    @csrf
    <div>
        <labe for="description">description</labe>
        <textarea value="{{old('description')}}" id="description" name="description"></textarea>
    </div>
    <div>
        <label>prix</label>
        <input value="{{old('prix')}}" type="number" name="prix" />
    </div>
    <div>
        <label>date</label>
        <input value="{{old('date')}}" type="date" name="date" />
    </div>

    <select name="fournisseur_id">
        <option selected disabled>selectionner fournisseur</option>
        @if(!empty($fournisseurs))
            @foreach($fournisseurs as $fournisseur)
                <option value="{{$fournisseur->id}}">{{ $fournisseur->raisonSociale }}</option>
            @endforeach
        @endif
    </select>
    <div>
        <button>Send</button>
    </div>
</form>

<a href="/">Go Home</a>