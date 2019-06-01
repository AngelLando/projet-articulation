@extends('layouts.app')


@section('content')
    <div id="app">
        <checkout-component cart="{{$cart}}"></checkout-component>
    </div>
@endsection