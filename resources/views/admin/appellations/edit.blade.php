@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edition: {{ $appellation->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('appellations.update', ['id' => $appellation->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="appellation">Appellation</label>
                            <input type="text" name="appellation" class="form-control {{ $errors->has('appellation') ? 'is-invalid' : '' }}" value="{{ $appellation->name }}" placeholder="Appellation">
                            @if ($errors->has('appellation'))
                            <div class="invalid-feedback">{{ $errors->first('appellation') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Mettre à jour l'appellation</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection