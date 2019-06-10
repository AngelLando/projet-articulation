@extends('layouts.app')


@section('content')
    <div id="app">
        <address-component cart="{{$cart}}"></address-component>
                    	        <popup-component></popup-component>

    </div>
@endsection