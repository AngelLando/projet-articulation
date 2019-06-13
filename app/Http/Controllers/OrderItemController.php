<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderItem;
use App\Product;

class OrderItemController extends Controller
{
    public static function store(Request $request, $orderId)
    {
        $products = $request->products;

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
}
