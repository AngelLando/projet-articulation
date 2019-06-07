@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>Fournisseurs <a href="{{ route('fournisseurs.create') }}"><button type="button" class="btn btn-primary float-right">Créer un nouveau fournisseur</button></a></h1>
    <table class="table table-hover">
        <thead>
            <th>Nom</th>
            <th>Site web</th>
            <th>Région</th>
            <th>Pays</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($suppliers->count() > 0)
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->name }}</td>
                <td><a href="{{ $supplier->url_website }}" target="_blank">{{ $supplier->url_website }}</a></td>
                <td>{{ $supplier->region->name }}</td>
                <td>{{ $supplier->region->country->name }}</td>
                <td><a href="{{ route('fournisseurs.edit', ['id' => $supplier->id]) }}" class="btn btn-xs btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('fournisseurs.destroy', ['id' => $supplier->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucun fournisseur.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $suppliers->links() }}
    </div>
</div>
@endsection