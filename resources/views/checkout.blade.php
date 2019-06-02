@extends('layouts.app')


@section('content')
    <div id="app">
        <checkout-component cart="{{$cart}}"></checkout-component>
        <address-component cart="{{$cart}}"></address-component>
    </div>
@endsection