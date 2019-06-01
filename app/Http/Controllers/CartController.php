<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Http\Controllers\ProductController;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = 1;
        $carts = ['carts' => Cart::all()];
        dd($carts);
       // return view('single', ['product' => Product::where('slug', $slug)->firstOrFail()]);
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

    public function checkout()
    {
        $userId = 1;
        $cart = ['cart' => Cart::where('user_id', $userId)->firstOrFail()];
        $cartItems = $cart['cart']->cartItems;
        $cart = [];
        foreach($cartItems as $cartItem) {
            $prod = ProductController::getById($cartItem->product_id);
            $product = $prod['product'];
            $newProduct= [];
            $newProduct['id'] = $product->id;
            $newProduct['name'] = $product->name;
            $newProduct['kind'] = $product->kind;
            $newProduct['year'] = $product->year;
            $newProduct['path_image'] = $product->path_image;
            $newProduct['stock'] = $product->stock;
            $newProduct['format'] = $product->format->name;
            $newProduct['quotation'] = $product->quotation;
            $newProduct['slug'] = $product->slug;
            $newProduct['price'] = $product->prices[0]->amount;
            //$newProduct['productRating'] = $product->productRatings[0]->value;
            $newProduct['packaging_capacity'] = $product->format->packagings[0]->capacity;
            $newProduct['quantity'] = $cartItem->quantity;
            $newProduct['error'] = self::checkForAvailability($newProduct['quantity'], $newProduct['stock']);
            array_push($cart, $newProduct);
        }

        // CONVERT ARRAY TO JSON TO PASS DATAS
        $json = json_encode($cart);
        return view('checkout')->with('cart', $json);

    }

    public static function checkForAvailability ($quantity, $stock) {
        if ($quantity > $stock) {
            return 'Erreur, il ne reste que '.$stock.' unités dans notre stock. Veuillez s\'il vous plaît diminuer la quantité demandée';
        } else {
            return null;
        }
    }
}
