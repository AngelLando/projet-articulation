@extends('layouts.app')


@section('content')
    <div id="app">
        <slider-homepage></slider-homepage>
        <mini-products-catalog prod="{{$products}}"></mini-products-catalog>
            	        <popup-component></popup-component>

    </div>
@endsection
