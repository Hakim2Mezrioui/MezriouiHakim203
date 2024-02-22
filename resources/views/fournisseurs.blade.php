<table>
    <tr>
        <th>raison social</th>
        <th>addresse</th>
        <th>telephone</th>
        <th></th>
    </tr>
    @foreach($fournisseurs as $fournisseur) 
        <tr>
            <td>{{ $fournisseur->raisonSociale }}</td>
            <td>{{ $fournisseur->addresse }}</td>
            <td>{{ $fournisseur->telephone }}</td>
            <td>
                <a href="supprimer_fournisseur/{{$fournisseur->id}}">Supprimer</a>
                <a href="modifier_fournisseur/{{$fournisseur->id}}">Modifier</a>
            </td>
        </tr>
    @endforeach
</table>

<a href="/">Go Home</a>