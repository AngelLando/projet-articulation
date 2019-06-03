@extends('layouts.app')

@section('content')
<products-single prod="{{$products}} "></products-single>
<products-catalog prod="{{$products}}"></products-catalog>
@endsection