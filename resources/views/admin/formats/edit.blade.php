@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container formats-editor"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edition: {{ $format->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('formats.update', ['id' => $format->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="format">Format</label>
                            <input type="text" name="format" class="form-control {{ $errors->has('format') ? 'is-invalid' : '' }}" value="{{ $format->name }}" placeholder="Format">
                            @if ($errors->has('format'))
                            <div class="invalid-feedback">{{ $errors->first('format') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary btn-edit-format" type="submit">Mettre à jour le format</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection

<style>

    .formats-editor {
        padding: 3em 0;
    }

    .btn-edit-format {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
