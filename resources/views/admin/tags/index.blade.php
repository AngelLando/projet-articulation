@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Tags <a href="{{ route('tags.create') }}"><button type="button" class="btn btn-primary float-right">Créer un nouveau tag</button></a></h1>
    <table class="table table-hover">
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
                <td><a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-xs btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('tags.destroy', ['id' => $tag->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" type="submit">Supprimer</button>
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