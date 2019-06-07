@extends('layouts.app')
@section('content')

<div class="container"><br>
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            Edition: {{ $promotion->type }}
        </div>

        <div class="card-body">
            <form action="{{ route('promotions.update', ['id' => $promotion->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-6">
                            <label for="promotion">Promotion</label>
                            <input type="text" name="promotion" class="form-control {{ $errors->has('promotion') ? 'is-invalid' : '' }}" value="{{ $promotion->type }}" placeholder="Promotion">
                            @if ($errors->has('promotion'))
                            <div class="invalid-feedback">{{ $errors->first('promotion') }}</div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="amount">Montant</label>
                            <input type="text" name="amount" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" value="{{ $promotion->amount }}" placeholder="Montant">
                            @if ($errors->has('amount'))
                            <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Mettre à jour la promotion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection