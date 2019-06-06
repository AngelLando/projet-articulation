@extends('layouts.app')

@section('content')
    <div class="special_offers" id="app">
        <div class="container pt45 pb70">
            <div class="row px20 pt0 title_container">
                <div class="col-md-5 hidden-xs hidden-sm block title">Offres spéciales</div>
            </div>
        </div>
        <big-catalog prod="{{$products}}"></big-catalog>
    </div>
@endsection


<style>

    .special_offers {
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
