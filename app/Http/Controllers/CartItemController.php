<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\CartItem;
use App\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(Request $request)
    {
        $selectedProductStock = Product::where('id', $request->product_id)->firstOrFail()->stock;

        $this->validate($request, [
            'quantity' => 'integer|max:' . $selectedProductStock,
        ]);

        if (Auth::check()) {
            // Create or get the user's cart
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

            // Get a CartItem already existing with same product in the same cart
            $similarCartItem = CartItem::where([['product_id', $request->product_id], ['cart_id', $cart->id]])->first();

            // If it exists, update values, if not, store product
            if ($similarCartItem == null) {
                $cartItem = CartItem::create([
                    'product_id' => $request->product_id,
                    'cart_id' => $cart->id,
                    'quantity' => $request->quantity
                ]);
            } else {
                $actualQuantity = CartItem::where('id', $similarCartItem->id)->first()->quantity;
                $cartItem = CartItem::where('id', $similarCartItem->id)->update(['quantity' => $request->quantity + $actualQuantity]);
            }
        }
        $count = CartItem::where('cart_id', $cart->id)->count();
        return $count;
    }

    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::user()->id)->first();
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $id)->first()
                ->update(['quantity' => $request->quantity]);
            return 1;
        } else {
            return null;
        }
    }

    public function destroy($id)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            $cartItemId = $cart->cartItems->where('product_id', $id)->first()->id;
            CartItem::destroy($cartItemId);

            $count = CartItem::where('cart_id', $cart->id)->count();
            return $count;
        } else {
            return null;
        }
    }
}