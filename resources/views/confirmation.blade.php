@extends('layouts.app')


@section('content')
    <div class="confirm" id="app">
        <confirmation-component></confirmation-component>
    </div>
@endsection


<style>

    .confirm {
        padding-top: 2em;
        padding-bottom: 2em;
        min-height: 38.5em;
    }

</style>
