@extends('layouts.app')

@section('content')
    <div id="app">
        <filters-component prod="{{$products}}"></filters-component>
        <products-catalog prod="{{$products}}"></products-catalog>
    </div>
@endsection



