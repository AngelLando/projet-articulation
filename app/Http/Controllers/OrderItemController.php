<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use App\Product;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public static function store(Request $request, $orderId)
    {
        $products = $request->products;

        /*
        $request->validate([
            'products.quantity' => 'min:1'
        ]);*/
        $productsArray = [];
        foreach($products as $product) {

            OrderItem::create([
                'order_id' => $orderId,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'discount' => 0
            ]);

            $prod = Product::where('id', $product['id'])->get()->first();
            $stock = $prod->stock;
            $quantity = $product['quantity'];
            $newStock = $stock - $quantity;
            $updatedProduct = Product::where('id', $product['id'])->update(['stock' => $newStock]);

            $prodArray = [
                'product' => $prod,
                'quantity' => $quantity
            ];
            array_push($productsArray, $prodArray);
        }
     return $productsArray;
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
