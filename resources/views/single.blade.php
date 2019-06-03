@extends('layouts.app')

@section('content')
<products-single prod="{{$products}} "></products-single>
<div class="similar_products"><p>D'autres produits similaires</p></div>
<products-catalog prod="{{$products}}"></products-catalog>

@endsection