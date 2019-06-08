@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container packagings-editor"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edition: {{ $packaging->type }}
        </div>

        <div class="card-body">
            <form action="{{ route('conditionnements.update', ['id' => $packaging->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="packaging">Conditionnement</label>
                            <input type="text" name="packaging" class="form-control {{ $errors->has('packaging') ? 'is-invalid' : '' }}" value="{{ $packaging->type }}" placeholder="Conditionnement">
                            @if ($errors->has('packaging'))
                            <div class="invalid-feedback">{{ $errors->first('packaging') }}</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="capacity">Capacité</label>
                            <input type="number" name="capacity" class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}" value="{{ $packaging->capacity }}" placeholder="Capacité">
                            @if ($errors->has('capacity'))
                            <div class="invalid-feedback">{{ $errors->first('capacity') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary btn-edit-packaging" type="submit">Mettre à jour le packaging</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection

<style>

    .packagings-editor {
        padding: 3em 0;
    }

    .btn-edit-packaging {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
