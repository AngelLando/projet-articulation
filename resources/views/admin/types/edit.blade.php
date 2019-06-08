@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container types-editor"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edition: {{ $type->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('types.update', ['id' => $type->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="type">Type</label>
                            <input type="text" name="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" value="{{ $type->name }}" placeholder="Type">
                            @if ($errors->has('type'))
                            <div class="invalid-feedback">{{ $errors->first('type') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary btn-edit-type" type="submit">Mettre à jour le type</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection

<style>

    .types-editor {
        padding: 3em 0;
    }

    .btn-edit-type {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
