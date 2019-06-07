@extends('layouts.app')
@section('content')

<div class="container"><br>

    <div class="card">
        <div class="card-header">
            Création d'une nouvelle appellation
        </div>

        <div class="card-body">
            <form action="{{ route('appellations.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="appellation">Appellation</label>
                            <input type="text" name="appellation" class="form-control {{ $errors->has('appellation') ? 'is-invalid' : '' }}" placeholder="Appellation" value="{{ old('appellation') }}">
                            @if ($errors->has('appellation'))
                            <div class="invalid-feedback">{{ $errors->first('appellation') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Créer l'appellation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection