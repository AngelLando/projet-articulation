<!doctype html>
<html lang='fr'>
<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Nous tenons à vous remercier chaleureusement pour votre commande.</h1>
<h2>Voici un résumé de votre dernière facture.</h2>

<div>
    <h3>Informations de commande</h3>
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
</div>
<div>
    <h3>Produits</h3>
    @foreach ($billing['products'] as $product)
        <ul>
            <p> Produit : {{$product['product']['name']}} </p>
            <p> Quantité : {{$product['quantity']}} </p>

        </ul>
    @endforeach

    <h4>
        Total : {{$billing['total']}}
    </h4>
</div>
</body>
</html>
