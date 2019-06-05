@extends('layouts.app')


@section('content')
    <div id="app">
        <slider-homepage></slider-homepage>
        <big-catalog prod="{{$products}}"></big-catalog>
    </div>
@endsection
