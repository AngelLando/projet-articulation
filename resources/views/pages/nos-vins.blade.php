@extends('layouts.app')

@section('content')
    <div class="all_wines" id="app">

        <big-catalog prod="{{$products}}"></big-catalog>
    </div>
@endsection


<style>

    .all_wines {
        padding-top: 4em;
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
