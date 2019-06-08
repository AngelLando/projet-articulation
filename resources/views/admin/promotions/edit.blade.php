@extends('layouts.app')
@section('content')
@include('admin.includes.menu')

<div class="container promos-editor"><br>
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
                        <button class="btn btn-primary btn-edit-promo" type="submit">Mettre à jour la promotion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><br>
@endsection

<style>

    .promos-editor {
        padding: 3em 0;
    }

    .btn-edit-promo {
        background-color: #850038 !important;
        border-color: #850038 !important;
    }

</style>
