<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Address;
use App\Person;
use App\Http\Controllers\ProductController;

class CartController extends Controller
{
    public static function index($require)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $cart = Cart::where('user_id', $userId)->first();

            if ($cart == null) {
                $json = json_encode(null);
            } elseif ($cart->cartItems == null) {
                $json = json_encode(null);
                dd($json);
            } else {
                $cartItems = $cart->cartItems;
                $cart = [];

                foreach ($cartItems as $cartItem) {
                    $product = ProductController::getById($cartItem->product_id);
                    $newProduct = ProductController::getAllData($product['product']);
                    $newProduct['quantity'] = $cartItem['quantity'];
                    array_push($cart, $newProduct);
                }

                if($require == 'address') {

                    $person = Person::where('id', $userId)->first();
                    $address = Address::where('person_id' , $person->id)->first();

                    if($address == null) {
                        $favoriteAddress = null;
                    } else {
                        $favoriteAddress = [
                            'street' => $address->street,
                            'npa' => $address->npa,
                            'city' => $address->city,
                            'region' => $address->region,
                            'country' => $address->country,
                        ];
                    }
                    if($person == null) {
                        $person == null;
                    } else {
                        $favoriteAddress = [
                            'gender' => $person->gender,
                            'firstname' => $person->firstname,
                            'lastname' => $person->lastname,
                        ];
                    }

                    $data = [
                        'cart' => $cart,
                        'address' => $favoriteAddress
                    ];

                    $json = json_encode($data);
                } else {
                    $json = json_encode($cart);
                }
            }
        } else {
            $json = json_encode(null);
        }
        return $json;
    }

    public static function checkForAvailability($quantity, $stock)
    {
        if ($quantity > $stock) {
            return 'Erreur, il ne reste que ' . $stock . ' unités dans notre stock. Veuillez s\'il vous plaît diminuer la quantité demandée';
        } else {
            return null;
        }
    }
}


