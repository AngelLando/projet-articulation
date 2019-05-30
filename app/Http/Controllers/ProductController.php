<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = ['products' => Product::all()];
        return $all;
        /*
        $products = $all['products'];
        $allProducts = [];
        foreach($products as $product) {
            $newProduct = [];
            $newProduct['product_id'] = $product->id;
            $newProduct['product_name'] = $product->name;
            $newProduct['product_kind'] = $product->kind;
            $newProduct['product_year'] = $product->year;
            $newProduct['product_kind'] = $product->kind;
            $newProduct['product_path_image'] = $product->path_image;
            $newProduct['product_stock'] = $product->stock;
            $newProduct['format'] = $product->format->name;
            $newProduct['product_price'] = $product->prices[0]->amount;
            //$newProduct['productRating'] = $product->productRatings[0]->value;
            $newProduct['packaging_capacity'] = $product->format->packagings[0]->capacity;
            array_push($allProducts, $newProduct);
        }


        // CONVERT ARRAY TO JSON TO PASS DATAS
        $json = json_encode($allProducts);
        return view('homepage')->with('allProducts', $allProducts);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
