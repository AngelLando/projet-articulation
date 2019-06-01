@extends('layouts.app')


@section('content')
    <div id="app">
        <products-catalog prod="{{$products}}"></products-catalog>
    </div>
@endsection
