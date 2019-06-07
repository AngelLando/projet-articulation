<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\CartItem;
use App\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $selectedProductStock = Product::where('id', $request->product_id)->firstOrFail()->stock;

        $this->validate($request, [
            'quantity' => 'integer|max:' . $selectedProductStock,
        ]);

        if (Auth::check()) {
            //Create or get the user's cart
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

            //Get a CartItem already existing with same product in the same cart
            $similarCartItem = CartItem::where([['product_id', $request->product_id], ['cart_id', $cart->id]])->first();

            //If it exists, update values, if not, store product
            if ($similarCartItem == null) {
                $cartItem = CartItem::create([
                    'product_id' => $request->product_id,
                    'cart_id' => $cart->id,
                    'quantity' => $request->quantity
                ]);
            } else {
                $actualQuantity = CartItem::where('id', $similarCartItem->id)->first()->quantity;
                $cartItem = CartItem::where('id', $similarCartItem->id)
                    ->update(['quantity' => $request->quantity + $actualQuantity]);
            }
        }
        return $cartItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            $cartItemId = $cart->cartItems->where('product_id', $id)->first()->id;
            CartItem::destroy($cartItemId);
        } else {
            return null;
        }
    }
}
