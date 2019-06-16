@extends('layouts.app')

@section('content')
    <div class="promotions" id="app">

        <big-catalog prod="{{$products}}"></big-catalog>
                                <popup-component></popup-component>

    </div>
@endsection


<style>

    .promotions {
        padding-top: 4em;
        min-height: 38.5em;
    }

    .title {
        font-family: Montserrat;
        font-weight: bold;
        font-size: 20px;
        padding-left: 0em !important;
    }

    .row.title_container {
        margin-left: -2em !important;
    }

</style>
