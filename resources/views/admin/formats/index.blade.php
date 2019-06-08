@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container formats-index"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Formats <a href="{{ route('formats.create') }}"><button type="button" class="btn btn-primary btn-add-new-format float-right">Créer un nouveau format</button></a></h1>
    <table class="table table-hover table-formats">
        <thead>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($formats->count() > 0)
            @foreach($formats as $format)
            <tr>
                <td>{{ $format->name }}</td>
                <td><a href="{{ route('formats.edit', ['id' => $format->id]) }}" class="btn btn-xs btn-warning btn-edit">Modifier</a></td>
                <td>
                    <form action="{{ route('formats.destroy', ['id' => $format->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger btn-delete" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucun format.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $formats->links() }}
    </div>
</div>
@endsection


<style>

    .formats-index {
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

    .table-formats {
        margin-top: 3em;
    }

    .btn-add-new-format {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
