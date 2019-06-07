@extends('layouts.app')

@section('content')
    <div class="promotions" id="app">

        <big-catalog prod="{{$products}}"></big-catalog>
    </div>
@endsection


<style>

    .promotions {
        padding-top: 2em;
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
