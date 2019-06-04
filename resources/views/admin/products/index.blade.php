@extends('layouts.app')

@section('content')
<div class="container"><br>
    <h1>Vos produits <a href="{{ route('produits.create') }}"><button type="button" class="btn btn-primary">Créer un nouveau produit</button></a></h1>
    <table class="table table-hover">
        <thead>
            <th></th>
            <th>Type</th>
            <th>Nom</th>
            <th>Year</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($products->count() > 0)
            @foreach($products as $product)
                <tr>
                    <td><img src="{{ $product->path_image }}" alt="{{ $product->title }}"></td>
                    <td>{{ $product->kind }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->year }}</td>
                    <td><a href="{{ route('produits.edit', ['id' => $product->id]) }}" class="btn btn-xs btn-warning">Modifier</a></td>
                    <td>
                        <form action="{{ route('produits.destroy', ['id' => $product->id]) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-xs btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucun produit.</th>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection