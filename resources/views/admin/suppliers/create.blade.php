@extends('layouts.app')
@section('content')

<div class="container"><br>

    <div class="card">
        <div class="card-header">
            Création d'un nouveau fournisseur
        </div>

        <div class="card-body">
            <form action="{{ route('fournisseurs.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-4">
                            <label for="supplier">Fournisseur</label>
                            <input type="text" name="supplier" class="form-control {{ $errors->has('supplier') ? 'is-invalid' : '' }}" placeholder="Fournisseur" value="{{ old('supplier') }}">
                            @if ($errors->has('supplier'))
                            <div class="invalid-feedback">{{ $errors->first('supplier') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="type">Site web</label>
                            <input type="text" name="url_website" class="form-control {{ $errors->has('url_website') ? 'is-invalid' : '' }}" placeholder="Site web" value="{{ old('url_website') }}">
                            @if ($errors->has('url_website'))
                            <div class="invalid-feedback">{{ $errors->first('url_website') }}</div>
                            @endif
                        </div>
                        <div class="col-4">
                            <label for="region">Région</label>
                            <select name="region" id="region" class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}">
                                <option value="" disabled selected>Région</option>
                                @foreach($regions as $region)
                                    <option value="{{ $region->id }}" {{ old('region') == $region->id ? "selected" : '' }}>{{ $region->name }}</option>
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
                        <button class="btn btn-primary" type="submit">Créer le fournisseur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection