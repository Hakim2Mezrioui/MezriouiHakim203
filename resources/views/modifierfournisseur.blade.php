<form action="/modifier_fournisseur_db" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $fournisseur->id }}" />
    <div>
        <label>raison sociale</label>
        <input value="{{$fournisseur->raisonSociale}}" type="text" name="raisonSociale" />
    </div>
    <div>
        <label>addresse</label>
        <input value="{{$fournisseur->addresse}}" type="text" name="addresse" />
    </div>
    <div>
        <label>telephone</label>
        <input value="{{$fournisseur->telephone}}" type="tel" name="telephone" />
    </div>
    <div>
        <button>Send</button>
    </div>
</form>

<a href="/">Go Home</a>