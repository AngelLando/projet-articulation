@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container packagings-creator"><br>

    <div class="card">
        <div class="card-header">
            Création d'un nouveau conditionnement
        </div>

        <div class="card-body">
            <form action="{{ route('conditionnements.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="packaging">Conditionnement</label>
                            <input type="text" name="packaging" class="form-control {{ $errors->has('packaging') ? 'is-invalid' : '' }}" placeholder="Conditionnement" value="{{ old('packaging') }}">
                            @if ($errors->has('packaging'))
                            <div class="invalid-feedback">{{ $errors->first('packaging') }}</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="capacity">Capacité</label>
                            <input type="number" name="capacity" class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}" placeholder="Capacité" value="{{ old('capacity') }}">
                            @if ($errors->has('capacity'))
                            <div class="invalid-feedback">{{ $errors->first('capacity') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary btn-create-packaging" type="submit">Créer le conditionnement</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection

<style>

    .packagings-creator {
        padding: 3em 0;
    }

    .btn-create-packaging {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
