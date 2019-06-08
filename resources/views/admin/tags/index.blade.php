@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container tags-index"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Tags <a href="{{ route('tags.create') }}"><button type="button" class="btn btn-add-new-tag btn-primary float-right">Créer un nouveau tag</button></a></h1>
    <table class="table table-hover table-tags">
        <thead>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($tags->count() > 0)
            @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->name }}</td>
                <td><a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn-edit btn btn-xs btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('tags.destroy', ['id' => $tag->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-delete btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucun tag.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $tags->links() }}
    </div>
</div>
@endsection

<style>

    .tags-index {
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

    .table-tags {
        margin-top: 3em;
    }

    .btn-add-new-tag {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
