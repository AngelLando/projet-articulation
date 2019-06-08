@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container types-index"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Types <a href="{{ route('types.create') }}"><button type="button" class="btn btn-primary float-right btn-add-new-type">Créer un nouveau type</button></a></h1>
    <table class="table table-hover table-types">
        <thead>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($types->count() > 0)
            @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td><a href="{{ route('types.edit', ['id' => $type->id]) }}" class="btn btn-xs btn-warning btn-edit">Modifier</a></td>
                <td>
                    <form action="{{ route('types.destroy', ['id' => $type->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger btn-delete" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucun type.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $types->links() }}
    </div>
</div>
@endsection

<style>

    .types-index {
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

    .table-types {
        margin-top: 3em;
    }

    .btn-add-new-type {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
