<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingCostController extends Controller
{
    public static function getRigthShippingCost ($request) {
        $products = $request->products;
        $totalQuantity = 0;
        foreach($products as $product) {
            $totalQuantity = $product['quantity'] + $totalQuantity;
        }
        $shippingCostId = 1;
        switch ($totalQuantity) {
            case $totalQuantity < 12 :
                $shippingCostId = 2;
                break;
            case $totalQuantity >= 12 && $totalQuantity < 24 :
                $shippingCostId = 3;
                break;
            case $totalQuantity >= 24 && $totalQuantity < 35 :
                $shippingCostId = 4;
                break;
            case $totalQuantity >= 35 :
                $shippingCostId = 1;
                break;
        }
        return $shippingCostId;
    }
}