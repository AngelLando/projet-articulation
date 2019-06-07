@extends('layouts.app')

@section('content')

<div class="container"><br>

    <div class="card">
        <div class="card-header">
            Création d'un nouveau format
        </div>

        <div class="card-body">
            <form action="{{ route('formats.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="format">Format</label>
                            <input type="text" name="format" class="form-control {{ $errors->has('format') ? 'is-invalid' : '' }}" placeholder="Format" value="{{ old('format') }}">
                            @if ($errors->has('format'))
                            <div class="invalid-feedback">{{ $errors->first('format') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Créer le format</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection