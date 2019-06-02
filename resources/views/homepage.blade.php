@extends('layouts.app')


@section('content')
    <div id="app">
        <slider-homepage></slider-homepage>
        <products-catalog prod="{{$products}}"></products-catalog>
    </div>
@endsection
