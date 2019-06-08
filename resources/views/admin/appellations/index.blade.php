@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container appell-index"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Appellations <a href="{{ route('appellations.create') }}"><button type="button" class="btn btn-add-new-appel btn-primary float-right">Créer une nouvelle appellation</button></a></h1>
    <table class="table table-hover table-appel">
        <thead>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($appellations->count() > 0)
            @foreach($appellations as $appellation)
            <tr>
                <td>{{ $appellation->name }}</td>
                <td><a href="{{ route('appellations.edit', ['id' => $appellation->id]) }}" class="btn btn-xs btn-warning btn-edit">Modifier</a></td>
                <td>
                    <form action="{{ route('appellations.destroy', ['id' => $appellation->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger btn-delete" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucune appellation.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $appellations->links() }}
    </div>
</div>
@endsection

<style>

    .appell-index {
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

    .table-appel {
        margin-top: 3em;
    }

    .btn-add-new-appel {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
