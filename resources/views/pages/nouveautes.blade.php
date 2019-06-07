@extends('layouts.app')

@section('content')
    <div class="new_wines" id="app">
        <div class="container ">
            <div class="row px20  title_container">
                <div class="col-md-5 hidden-xs hidden-sm block title pt-2">Nouveautés</div>
            </div>
        </div>
        <big-catalog prod="{{$products}}"></big-catalog>
    </div>
@endsection


<style>

    .new_wines {
        padding-top: 2em;
    }

    .title{
        font-family: Montserrat;
        font-weight: bold;
        font-size: 20px;
        padding-left: 0em !important;
    }

    .row.title_container {
        margin-left: -2em !important;
    }

</style>
