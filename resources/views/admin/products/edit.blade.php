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
            {{ $product->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('produits.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-3">
                            <label for="kind">Catégorie</label>
                            <select name="kind" id="kind" class="form-control">
                                    <option value="" disabled selected>Catégorie</option>
                                    <option value="Vin rouge" @if($product->kind == 'Vin rouge') selected @endif>Vin rouge</option>
                                    <option value="Vin blanc" @if($product->kind == 'Vin blanc') selected @endif>Vin blanc</option>
                                    <option value="Vin mousseux" @if($product->kind == 'Vin mousseux') selected @endif>Vin mousseux</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="name">Nom</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" placeholder="Nom">
                        </div>
                        <div class="col-3">
                            <label for="year">Année</label>
                            <input type="number" name="year" class="form-control" value="{{ $product->year }}" placeholder="Année">
                        </div>
                        <div class="col-3">
                            <label for="price">Prix</label>
                            <input type="number" name="price" class="form-control" value="{{ $product->price }}" placeholder="Prix">
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
                            <label for="weight">Poids <small>gr</small></label>
                            <input type="number" name="weight" class="form-control" value="{{ $product->weight }}" placeholder="Poids">
                        </div>
                        <div class="col-4">
                            <label for="stock">Stock <small>unité</small></label>
                            <input type="text" name="stock" class="form-control" value="{{ $product->stock }}" placeholder="Stock">
                        </div>
                        <div class="col-4">
                            <label for="alcohol">Alcool <small>% vol.</small></label>
                            <input type="number" name="alcohol" class="form-control" value="{{ $product->alcohol }}" placeholder="Alcool">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="quotation">Avis</label>
                    <input type="text" name="quotation" class="form-control" value="{{ $product->quotation }}" placeholder="Avis">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="format">Format</label>
                            <select name="format" id="format" class="form-control">
                                <option value="" disabled selected>Format</option>
                                @foreach($formats as $format)
                                    <option value="{{ $format->id }}" @if($product->format == $format) selected @endif>{{ $format->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="" disabled selected>Type</option>
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}" @if($product->type == $type) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="supplier">Fournisseur</label>
                            <select name="supplier" id="supplier" class="form-control">
                                <option value="" disabled selected>Fournisseur</option>
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
                        <option value="" disabled selected>Promotion</option>
                        <option value="" @if($product->promotion == '') selected @endif>Aucune</option>
                        @foreach($promotions as $promotion)
                            <option value="{{ $promotion->id }}" @if($product->promotion == $promotion) selected @endif>{{ $promotion->type }} – {{ $promotion->amount }}% de rabais</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">       
                            <label for="packagings">Conditionnements</label>
                            @foreach($packagings as $packaging)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="packagings[]" value="{{ $packaging->id }}"
                                    @foreach($product->format->packagings as $p)
                                        @if($packaging->id == $p->id)
                                            checked
                                        @endif
                                    @endforeach
                                    > {{ $packaging->type }} – {{ $packaging->capacity }} {{ ($packaging->capacity <= 1 ? 'unité' : 'unités')}} </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-4">       
                            <label for="packagings">Appellations</label>
                            @foreach($appellations as $appellation)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="appellations[]" value="{{ $appellation->id }}"
                                    @foreach($product->appellations as $a)
                                        @if($appellation->id == $a->id)
                                            checked
                                        @endif
                                    @endforeach
                                    > {{ $appellation->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-4">       
                            <label for="packagings">Tags</label>
                            @foreach($tags as $tag)
                                <div class="checkbox">
                                    <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    @foreach($product->tags as $t)
                                        @if($tag->id == $t->id)
                                            checked
                                        @endif
                                    @endforeach
                                    > {{ $tag->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
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