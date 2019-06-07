@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>Promotions <a href="{{ route('promotions.create') }}"><button type="button" class="btn btn-primary float-right">Créer une nouvelle promotion</button></a></h1>
    <table class="table table-hover">
        <thead>
            <th>Nom</th>
            <th>Montant</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
        @if($promotions->count() > 0)
            @foreach($promotions as $promotion)
            <tr>
                <td>{{ $promotion->type }}</td>
                <td>{{ $promotion->amount }}%</td>
                <td><a href="{{ route('promotions.edit', ['id' => $promotion->id]) }}" class="btn btn-xs btn-warning">Modifier</a></td>
                <td>
                    <form action="{{ route('promotions.destroy', ['id' => $promotion->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="5" class="text-center">Vous n'avez aucune promotion.</th>
            </tr>
        @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $promotions->links() }}
    </div>
</div>
@endsection