@extends('layouts.app')

@section('content')

<div class="container"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::has('info'))
    <div class="alert alert-info">
        {{ Session::get('info') }}
    </div>
@endif
    <div class="card">
        <div class="card-header">
            {{ $product->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('produits.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="kind">Type</label>
                            <select name="kind" id="kind" class="form-control">
                                    <option value="Vin rouge" @if($product->kind == 'Vin rouge') selected @endif>Vin rouge</option>
                                    <option value="Vin blanc" @if($product->kind == 'Vin blanc') selected @endif>Vin blanc</option>
                                    <option value="Vin mousseux" @if($product->kind == 'Vin mousseux') selected @endif>Vin mousseux</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Nom">
                        </div>
                        <div class="col-4">
                            <label for="year">Année</label>
                            <input type="number" name="year" class="form-control" value="{{ $product->year }}" placeholder="Année">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Description">{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="path_image">Image</label>
                    <input type="file" name="path_image" class="form-control">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="weight">Poids</label>
                            <input type="text" name="weight" class="form-control" value="{{ $product->weight }}" placeholder="Poids">
                        </div>
                        <div class="col-4">
                            <label for="stock">Stock</label>
                            <input type="text" name="stock" class="form-control" value="{{ $product->stock }}" placeholder="Stock">
                        </div>
                        <div class="col-4">
                            <label for="alcohol">Alcool</label>
                            <input type="text" name="alcohol" class="form-control" value="{{ $product->alcohol }}" placeholder="Alcool">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quotation">Avis</label>
                    <input type="text" name="quotation" class="form-control" value="{{ $product->quotation }}" placeholder="Avis">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-3">
                            <label for="format">Format</label>
                            <select name="format" id="format" class="form-control">
                                @foreach($formats as $format)
                                    <option value="{{ $format->id }}" @if($product->format == $format) selected @endif>{{ $format->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="packaging">Conditonnement</label>
                            <select name="packaging" id="packaging" class="form-control">
                                @foreach($product->format->packagings as $packaging)
                                    <option value="{{ $packaging->id }}" @if($product->format->packagings == $packaging) selected @endif>{{ $packaging->type }} – {{ $packaging->capacity }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" @if($product->type == $type) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="supplier">Fournisseur</label>
                            <select name="supplier" id="supplier" class="form-control">
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if($product->supplier == $supplier) selected @endif>{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <label for="promotion">Promotion</label>
                    <select name="promotion" id="promotion" class="form-control">
                        @foreach($promotions as $promotion)
                            <option value="{{ $promotion->id }}" @if($product->promotion == $promotion) selected @endif>{{ $promotion->type }} – {{ $promotion->amount }}% de rabais</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Mettre à jour le produit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection