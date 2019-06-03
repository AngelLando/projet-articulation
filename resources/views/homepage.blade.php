@extends('layouts.app')


@section('content')
    <div id="app">
        <slider-homepage></slider-homepage>
        <filters-component prod="{{$products}}"></filters-component>
        <products-catalog prod="{{$products}}"></products-catalog>
    </div>
@endsection
