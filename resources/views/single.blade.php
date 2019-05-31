@extends('layouts.app')

@section('content')

        <article class="row bg-primary">
            <div class="col-md-12">
                <header>
                    <h1>{{ $product->name }}</h1>
                    <div class="pull-right">
                    </div>
                </header>
                <hr>
                <section>
                    <p>{{ $product->year }}</p>
                    <p>{{ $product->kind }}</p>
                    <img src="{{ $product->path_image }}" alt="">
                </section>
            </div>
        </article>
        <br>
@endsection