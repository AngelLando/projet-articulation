@extends('layouts.app')

@section('content')
<products-single prod="{{$product}} "></products-single>
<div class="similar_products"><p>D'autres produits similaires</p></div>


@endsection