@extends('layouts.app')

@section('content')
    <div id="app">
      <div class="d-flex justify-content-center">
          <div class="p-2"><h2>Nos primeurs</h2></div>
          <big-catalog prod="{{$products}}"></big-catalog>

        </div>
    </div>
@endsection
