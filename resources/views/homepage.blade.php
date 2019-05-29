@extends('template')


@section('contenu')


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
                </section>
                </hr>
            </div>
        </article>
        <br>
    @endforeach
@endsection