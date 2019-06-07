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
            Edition: {{ $tag->name }}
        </div>

        <div class="card-body">
            <form action="{{ route('tags.update', ['id' => $tag->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-12">
                            <label for="tag">Tag</label>
                            <input type="text" name="tag" class="form-control {{ $errors->has('tag') ? 'is-invalid' : '' }}" value="{{ $tag->name }}" placeholder="Tag">
                            @if ($errors->has('tag'))
                            <div class="invalid-feedback">{{ $errors->first('tag') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Mettre à jour le tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection