@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container suppliers-editor"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edition: {{ $supplier->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('fournisseurs.update', ['id' => $supplier->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="supplier">Fournisseur</label>
                            <input type="text" name="supplier" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : '' }}" value="{{ $supplier->name }}" placeholder="Fournisseur">
                            @if ($errors->has('supplier'))
                            <div class="invalid-feedback">{{ $errors->first('supplier') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="url_website">Site web</label>
                            <input type="text" name="url_website" class="form-control {{ $errors->has('url_website') ? 'is-invalid' : '' }}" value="{{ $supplier->url_website }}" placeholder="Site web">
                            @if ($errors->has('url_website'))
                            <div class="invalid-feedback">{{ $errors->first('url_website') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="region">Région</label>
                            <select name="region" id="region" class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}">
                                <option value="" disabled selected>Régions</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" @if($supplier->region == $region) selected @endif>{{ $region->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('region'))
                            <div class="invalid-feedback">{{ $errors->first('region') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary btn-edit-supplier" type="submit">Mettre à jour le fournisseur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection

<style>

    .suppliers-editor {
        padding: 3em 0;
    }

    .btn-edit-supplier {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
