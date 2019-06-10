@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container products-index "><br>

    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <h1 class="big-title">Produits <a href="{{ route('produits.create') }}"><button type="button" class="btn btn-primary btn-add-new-product float-right">Créer un nouveau produit</button></a></h1>
    <table class="table table-products table-hover">
        <thead>
            <th></th>
            <th>Catégorie</th>
            <th>Nom</th>
            <th>Année</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($products->count() > 0)
            @foreach($products as $product)
                <td><img src="{{ asset($product->path_image) }}" alt="{{ $product->title }}" height="120px"></td>
                <td>{{ $product->kind }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->year }}</td>
                <td><a href="{{ route('produits.edit', ['id' => $product->id]) }}" class="btn btn-xs btn-edit btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('produits.destroy', ['id' => $product->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger btn-delete" type="submit">Supprimer</button>
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
    <div class="text-center">
        {{ $products->links() }}
    </div>
</div>
@endsection


<style>

    .products-index {
        padding: 3em 0;
    }

    .btn-edit {
        background-color: #bcbabc !important;
        border-color: #bcbabc !important;
        color: white !important;
    }

    .btn-delete {
        background-color: rgba(133, 0, 56, 0.6) !important;
        border-color: rgba(133, 0, 56, 0.1) !important;
    }

    .table-products {
        margin-top: 3em;
    }

    .btn-add-new-product {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

    .page-link {
        background-color: red;
    }


</style>
