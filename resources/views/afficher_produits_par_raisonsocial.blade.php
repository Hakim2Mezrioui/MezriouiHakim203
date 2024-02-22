<form method="POST" action="afficher_produits_par_raisonsocial_db">
    @csrf
    <select name="raisonSociale">
        @foreach($raisonSociales as $raisonSociale)
            <option {{$raisonSociale->raisonSociale ===  $selectedRaisonSociale ? "selected" : ""}} value="{{ $raisonSociale->raisonSociale }}">{{ $raisonSociale->raisonSociale }}</option>
        @endforeach
    </select>

    <button>valider</button>
</form>

@if(!empty($produits))
    <table>
        <tr>
            <th>description</th>
            <th>prix</th>
            <th>date</th>
            <th></th>
        </tr>
        @foreach($produits as $produit) 
        <tr>
            <td>{{ $produit->description }}</td>
            <td>{{ $produit->prix }}</td>
            <td>{{ $produit->date }}</td>
            <td>{{ $produit->raisonSociale }}</td>
        </tr>
        @endforeach
    </table> 
@endif