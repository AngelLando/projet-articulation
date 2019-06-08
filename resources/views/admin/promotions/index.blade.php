@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container promos-index"><br>

@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1 class="big-title">Promotions <a href="{{ route('promotions.create') }}"><button type="button" class="btn btn-primary btn-add-new-promo float-right">Créer une nouvelle promotion</button></a></h1>
    <table class="table table-hover table-promos">
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
                <td><a href="{{ route('promotions.edit', ['id' => $promotion->id]) }}" class="btn btn-xs btn-warning btn-edit">Modifier</a></td>
                <td>
                    <form action="{{ route('promotions.destroy', ['id' => $promotion->id]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-xs btn-danger btn-delete" type="submit">Supprimer</button>
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

<style>

    .promos-index {
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

    .table-promos {
        margin-top: 3em;
    }

    .btn-add-new-promo {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
