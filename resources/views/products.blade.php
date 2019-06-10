@extends('layouts.app')

@section('content')
    @foreach($allProducts as $product)
        <article class="row bg-primary">
            <div class="col-md-12">
                <header>
                    <h1>{{$product['product_name']}}</h1>
                    <div class="pull-right">
                    </div>
                </header>
                <hr>
                <section>
                    <p>{{$product['product_year']}}</p>
                    <p>{{$product['product_kind']}}</p>
                    <img src="{{$product['product_path_image']}}" alt="">
                    <a href="{{ route('product.single', ['id' => $product['product_id']]) }}"><button type="button" class="btn btn-secondary">Voir ce produit</button></a>
                </section>

            </div>
        </article>
        <br>
    @endforeach
     <div id="app">
       <products-component></products-component>
                            <popup-component></popup-component>

    </div>
@endsection
