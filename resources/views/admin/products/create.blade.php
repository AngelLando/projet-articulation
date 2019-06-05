@extends('layouts.app')

@section('content')

<div class="container"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
@endforeach

    <div class="card">
        <div class="card-header">
            Création d'un nouveau produit
        </div>

        <div class="card-body">
            <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-3">
                            <label for="kind">Catégorie</label>
                            <select name="kind" id="kind" class="form-control">
                                    <option value="" disabled selected>Catégorie</option>
                                    <option value="Vin rouge">Vin rouge</option>
                                    <option value="Vin blanc">Vin blanc</option>
                                    <option value="Vin mousseux">Vin mousseux</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" placeholder="Nom">
                        </div>
                        <div class="col-3">
                            <label for="year">Année</label>
                            <input type="number" name="year" class="form-control" placeholder="Année">
                        </div>
                        <div class="col-3">
                            <label for="price">Prix</label>
                            <input type="number" name="price" class="form-control" placeholder="Prix">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="path_image">Image</label>
                    <input type="file" name="path_image" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="weight">Poids <small>gr</small></label>
                            <input type="number" name="weight" class="form-control" placeholder="Poids">
                        </div>
                        <div class="col-4">
                            <label for="stock">Stock <small>unité</small></label>
                            <input type="number" name="stock" class="form-control" placeholder="Stock">
                        </div>
                        <div class="col-4">
                            <label for="alcohol">Alcool <small>% vol.</small></label>
                            <input type="number" name="alcohol" class="form-control" placeholder="Alcool">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quotation">Avis</label>
                    <input type="text" name="quotation" class="form-control" placeholder="Avis">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="format">Format</label>
                            <select name="format" id="format" class="form-control">
                                <option value="" disabled selected>Format</option>
                                @foreach($formats as $format)
                                    <option value="{{ $format->id }}">{{ $format->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="" disabled selected>Type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="supplier">Fournisseur</label>
                            <select name="supplier" id="supplier" class="form-control">
                                <option value="" disabled selected>Fournisseur</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label for="promotion">Promotion</label>
                    <select name="promotion" id="promotion" class="form-control">
                        <option value="" disabled selected>Promotion</option>
                        <option value="">Aucune</option>
                        @foreach($promotions as $promotion)
                            <option value="{{ $promotion->id }}">{{ $promotion->type }} – {{ $promotion->amount }}% de rabais</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="packagings">Conditionnements</label>
                            @foreach($packagings as $packaging)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="packagings[]" value="{{ $packaging->id }}"> {{ $packaging->type }} – {{ $packaging->capacity }} {{ ($packaging->capacity <= 1 ? 'unité' : 'unités')}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-4">
                            <label for="packagings">Appellations</label>
                            @foreach($appellations as $appellation)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="appellations[]" value="{{ $appellation->id }}"> {{ $appellation->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-4">
                            <label for="packagings">Tags</label>
                            @foreach($tags as $tag)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->name }}<label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Créer le produit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection