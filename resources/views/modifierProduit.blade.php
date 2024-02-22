<form action="/modifier_produit_db" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $produit->id }}" />
    <div>
        <labe for="description">description</labe>
        <textarea id="description" name="description">
            {{$produit->description}}
        </textarea>
    </div>
    <div>
        <label>prix</label>
        <input value="{{$produit->prix}}" type="number" name="prix" />
    </div>
    <div>
        <label>date</label>
        <input value="{{$produit->date}}" type="date" name="date" />
    </div>

    <select name="fournisseur_id">
        <option disabled>selectionner fournisseur</option>
            @foreach($fournisseurs as $fournisseur)
                <option 
                    value="{{$fournisseur->id}}" 
                    {{ $produit->fournisseur_id === $fournisseur->id ? 'selected' : '' }}>
                    {{ $fournisseur->raisonSociale }}
                </option>
            @endforeach
    </select>
    <div>
        <button>Send</button>
    </div>
</form>

<a href="/">Go Home</a>