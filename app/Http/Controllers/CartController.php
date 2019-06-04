<?php

namespace App\Http\Controllers;

use Auth;
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
        if(Auth::check()) {
            $userId = Auth::id();

            $cart = ['cart' => Cart::where('user_id', $userId)->firstOrFail()];
            $cartItems = $cart['cart']->cartItems;
            $cart = [];

            foreach ($cartItems as $cartItem) {
                $product = ProductController::getById($cartItem->product_id);
                $newProduct = ProductController::getAllData($product['product']);
                //$newProduct['error'] = self::checkForAvailability($newProduct['quantity'], $newProduct['stock']);
                array_push($cart, $newProduct);
            }

            // CONVERT ARRAY TO JSON TO PASS DATAS
            $json = json_encode($cart);
            return view('cart')->with('cart', $json);
        } else {
            $json = json_encode(null);
            return view('cart')->with('cart', $json);
        }
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
        if(Auth::check()) {
            $userId = Auth::id();
            $cart = ['cart' => Cart::where('user_id', $userId)->firstOrFail()];
            $cartItems = $cart['cart']->cartItems;
            $cart = [];

            foreach ($cartItems as $cartItem) {
                $product = ProductController::getById($cartItem->product_id);
                $newProduct = ProductController::getAllData($product['product']);

                $newProduct['quantity'] = $cartItem['quantity'];
                //$newProduct['error'] = self::checkForAvailability($newProduct['quantity'], $newProduct['stock']);
                array_push($cart, $newProduct);
            }

            // CONVERT ARRAY TO JSON TO PASS DATAS
            $json = json_encode($cart);
            return view('checkout')->with('cart', $json);
        } else {
            $json = json_encode(null);
            return view('cart')->with('cart', $json);
        }
    }

    public static function checkForAvailability ($quantity, $stock) {
        if ($quantity > $stock) {
            return 'Erreur, il ne reste que '.$stock.' unités dans notre stock. Veuillez s\'il vous plaît diminuer la quantité demandée';
        } else {
            return null;
        }
    }
}
