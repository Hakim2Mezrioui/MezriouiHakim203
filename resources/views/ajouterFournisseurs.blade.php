<form action="/ajouter_fournisseur_db" method="POST">
    @csrf
    <div>
        <label>raison sociale</label>
        <input value="{{old('raisonSociale')}}" type="text" name="raisonSociale" />
    </div>
    <div>
        <label>addresse</label>
        <input value="{{old('addresse')}}" type="text" name="addresse" />
    </div>
    <div>
        <label>telephone</label>
        <input value="{{old('telephone')}}" type="tel" name="telephone" />
    </div>
    <div>
        <button>Send</button>
    </div>
</form>

<a href="/">Go Home</a>