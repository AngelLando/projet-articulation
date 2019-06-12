@extends('layouts.app')


@section('content')
    <div id="app">
        <search-results res="{{$products}}"></search-results>
        <mini-products-catalog prod="{{$products}}"></mini-products-catalog>
    </div>
@endsection
