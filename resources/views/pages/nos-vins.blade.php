@extends('layouts.app')

@section('content')
    <div id="app">
        <big-catalog prod="{{$products}}"></big-catalog>
    </div>
@endsection



