@extends('layouts.app')
@section('content')

<div class="container"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>Packagings <a href="{{ route('conditionnements.create') }}"><button type="button" class="btn btn-primary float-right">Créer un nouveau packaging</button></a></h1>
    <table class="table table-hover">
        <thead>
            <th>Nom</th>
            <th>Capacité</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($packagings->count() > 0)
            @foreach($packagings as $packaging)
            <tr>
                <td>{{ $packaging->type }}</td>
                <td>{{ $packaging->capacity }}</td>
                <td><a href="{{ route('conditionnements.edit', ['id' => $packaging->id]) }}" class="btn btn-xs btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('conditionnements.destroy', ['id' => $packaging->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucun packaging.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $packagings->links() }}
    </div>
</div>
@endsection