@extends('layouts.app')

@section('content')
<products-single prod="{{$products}} "></products-single>
<mini-products-catalog prod="{{$products}}"></mini-products-catalog>
@endsection
