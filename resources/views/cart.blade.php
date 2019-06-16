@extends('layouts.app')


@section('content')
    <div class="cart" id="app">
    	        <cart-component cart="{{$cart}}"></cart-component>
    	                    	        <popup-component></popup-component>

    </div>
@endsection


<style>

    .cart {
        padding-top: 2em;
        padding-bottom: 2em;
        min-height: 38.5em;
    }

</style>
