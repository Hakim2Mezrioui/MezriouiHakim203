<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre de Produits</th>
            <th>Nombre de Fournisseurs</th>
            <th>Le prix maximale des produits</th>
            <th>Le prix minimale des produits</th>
        </tr>
        <tr>
            <td>{{ $nbrProduit }}</td>
            <td>{{ $nbrFournisseur }}</td>
            <td>{{ $prixMax }}</td>
            <td>{{ $prixMin }}</td>
        </tr>
    </table>

    <ul>
        @foreach($nbrProduitByFournisseur as $fournisseur)
            <li>Fournisseur ID: . {{  $fournisseur->id }}, Raison Sociale: {{ $fournisseur->raisonSociale }},  Nombre de produits: {{ $fournisseur->nombre_produits }}</li>
        @endforeach
    </ul>

    <a href="/">Go Home</a>
</body>
</html>