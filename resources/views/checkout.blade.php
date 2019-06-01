@extends('layouts.app')


@section('content')
    <div id="app">
        <checkout-component cart="{{$cart}}"></checkout-component>
        <address-component></address-component>
    </div>
@endsection