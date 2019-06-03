@extends('layouts.app')


@section('content')
    <div id="app">
    	        <cart-component cart="{{$cart}}"></cart-component>
    </div>
@endsection