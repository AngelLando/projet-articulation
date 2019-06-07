@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if ($errors->has('packagings'))
    <div class="alert alert-danger">{{ $errors->first('packagings') }}</div>
@endif

@if ($errors->has('appellations'))
    <div class="alert alert-danger">{{ $errors->first('appellations') }}</div>
@endif

@if ($errors->has('tags'))
    <div class="alert alert-danger">{{ $errors->first('tags') }}</div>
@endif

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
                            <select name="kind" id="kind" class="form-control {{ $errors->has('kind') ? 'is-invalid' : '' }}">
                                    <option value="" disabled selected>Catégorie</option>
                                    <option value="Vin rouge" {{ old('kind') == "Vin rouge" ? "selected" : '' }}>Vin rouge</option>
                                    <option value="Vin blanc" {{ old('kind') == "Vin blanc" ? "selected" : '' }}>Vin blanc</option>
                                    <option value="Vin mousseux" {{ old('kind') == "Vin mousseux" ? "selected" : '' }}>Vin mousseux</option>
                            </select>
                            @if ($errors->has('kind'))
                            <div class="invalid-feedback">{{ $errors->first('kind') }}</div>
                            @endif
                        </div>
                        <div class="col-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nom" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="col-3">
                            <label for="year">Année</label>
                            <input type="number" name="year" class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}" placeholder="Année" value="{{ old('year') }}">
                            @if ($errors->has('year'))
                            <div class="invalid-feedback">{{ $errors->first('year') }}</div>
                            @endif
                        </div>
                        <div class="col-3">
                            <label for="price">Prix</label>
                            <input type="number" name="price" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" placeholder="Prix" value="{{ old('price') }}">
                            @if ($errors->has('price'))
                            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description"></textarea>
                    @if ($errors->has('description'))
                    <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="path_image">Image</label>
                    <input type="file" name="path_image" class="form-control {{ $errors->has('path_image') ? 'is-invalid' : '' }}">
                    @if ($errors->has('path_image'))
                    <div class="invalid-feedback">{{ $errors->first('path_image') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="weight">Poids <small>gr</small></label>
                            <input type="number" name="weight" class="form-control {{ $errors->has('weight') ? 'is-invalid' : '' }}" placeholder="Poids" value="{{ old('weight') }}">
                            @if ($errors->has('weight'))
                            <div class="invalid-feedback">{{ $errors->first('weight') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="stock">Stock <small>unité</small></label>
                            <input type="number" name="stock" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" placeholder="Stock" value="{{ old('stock') }}">
                            @if ($errors->has('stock'))
                            <div class="invalid-feedback">{{ $errors->first('stock') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="alcohol">Alcool <small>% vol.</small></label>
                            <input type="number" name="alcohol" class="form-control {{ $errors->has('alcohol') ? 'is-invalid' : '' }}" placeholder="Alcool" value="{{ old('alcohol') }}">
                            @if ($errors->has('alcohol'))
                            <div class="invalid-feedback">{{ $errors->first('alcohol') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quotation">Avis</label>
                    <input type="text" name="quotation" class="form-control {{ $errors->has('quotation') ? 'is-invalid' : '' }}" placeholder="Avis" value="{{ old('quotation') }}">
                    @if ($errors->has('quotation'))
                    <div class="invalid-feedback">{{ $errors->first('quotation') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="format">Format</label>
                            <select name="format" id="format" class="form-control {{ $errors->has('format') ? 'is-invalid' : '' }}">
                                <option value="" disabled selected>Format</option>
                                @foreach($formats as $format)
                                    <option value="{{ $format->id }}" {{ old('format') == $format->id ? "selected" : '' }}>{{ $format->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('format'))
                            <div class="invalid-feedback">{{ $errors->first('format') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
                                <option value="" disabled selected>Type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ old('type') == $type->id ? "selected" : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('type'))
                            <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="supplier">Fournisseur</label>
                            <select name="supplier" id="supplier" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : '' }}">
                                <option value="" disabled selected>Fournisseur</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ old('supplier') == $supplier->id ? "selected" : '' }}>{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('supplier'))
                            <div class="invalid-feedback">{{ $errors->first('supplier') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label for="promotion">Promotion</label>
                    <select name="promotion" id="promotion" class="form-control {{ $errors->has('promotion') ? 'is-invalid' : '' }}">
                        <option value="" disabled selected>Promotion</option>
                        @foreach($promotions as $promotion)
                            <option value="{{ $promotion->id }}" {{ old('promotion') == $promotion->id ? "selected" : '' }}>{{ $promotion->type }} – {{ $promotion->amount }}% de rabais</option>
                        @endforeach
                    </select>
                    @if ($errors->has('promotion'))
                    <div class="invalid-feedback">{{ $errors->first('promotion') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="packagings">Conditionnements</label>
                            @foreach($packagings as $packaging)
                            <div class="form-check">
                                <label><input class="form-check-input" type="checkbox" name="packagings[]" value="{{ $packaging->id }}" {{ (is_array(old('packagings')) && in_array($packaging->id, old('packagings'))) ? 'checked' : '' }}> {{ $packaging->type }} – {{ $packaging->capacity }} {{ ($packaging->capacity <= 1 ? 'unité' : 'unités')}}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-4">
                            <label for="appellations">Appellations</label>
                            @foreach($appellations as $appellation)
                                <div class="form-check">
                                    <label><input class="form-check-input" type="checkbox" name="appellations[]" value="{{ $appellation->id }}" {{ (is_array(old('appellations')) && in_array($appellation->id, old('appellations'))) ? 'checked' : '' }}> {{ $appellation->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-4">
                            <label for="tags">Tags</label>
                            @foreach($tags as $tag)
                                <div class="form-check">
                                    <label><input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'checked' : '' }}> {{ $appellation->name }}> {{ $tag->name }}<label>
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