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
        <td>
            <a href="supprimer_produit/{{$produit->id}}">Supprimer</a>
            <a href="modifier_produit/{{$produit->id}}">Modifier</a>
        </td>
    </tr>
    @endforeach
</table> 

<a href="/">Go Home</a>