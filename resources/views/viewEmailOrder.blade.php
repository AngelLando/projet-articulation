<!doctype html>
<html lang='fr'>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h2>Bonjour !</h2>
<p>Résumé de la dernière facture :</p>
<ul>Prénom : {{$billing['firstname']}}
</ul>
<ul>
    Nom : {{$billing['lastname']}}
</ul>
<ul>
    Rue : {{$billing['street']}}
</ul>
<ul>
    NPA : {{$billing['npa']}}
</ul>
<ul>
    Localité : {{$billing['city']}}
</ul>
<ul>
    Pays : {{$billing['country']}}
</ul>
<div>
    Produits :
    @foreach ($billing['products'] as $product)
        <div>
            <p> Produit : {{$product['product']['name']}} </p>
            <p> Quantité : {{$product['quantity']}} </p>

        </div>
    @endforeach

</div>


</body>
</html>
