@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container packagings-index"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Conditionnements <a href="{{ route('conditionnements.create') }}"><button type="button" class="btn btn-add-new-packaging btn-primary float-right">Créer un nouveau conditionnement</button></a></h1>
    <table class="table table-hover table-packagings">
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
                <td><a href="{{ route('conditionnements.edit', ['id' => $packaging->id]) }}" class="btn btn-xs btn-edit btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('conditionnements.destroy', ['id' => $packaging->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger btn-delete" type="submit">Supprimer</button>
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

<style>

    .packagings-index {
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

    .table-packagings {
        margin-top: 3em;
    }

    .btn-add-new-packaging {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
