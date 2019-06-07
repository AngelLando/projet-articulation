@extends('layouts.app')
@section('content')

<div class="container"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>Appellations <a href="{{ route('appellations.create') }}"><button type="button" class="btn btn-primary float-right">Créer une nouvelle appellation</button></a></h1>
    <table class="table table-hover">
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
                <td><a href="{{ route('appellations.edit', ['id' => $appellation->id]) }}" class="btn btn-xs btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('appellations.destroy', ['id' => $appellation->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" type="submit">Supprimer</button>
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