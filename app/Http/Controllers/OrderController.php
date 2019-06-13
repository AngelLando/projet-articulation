<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Person;
use App\ShippingCost;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingCostController;
use Mail;

class OrderController extends Controller
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

        if($request->products == null) {
            return 0;
        }

        $request->validate([
            'cgv' => 'required|in:1,true',
            'address1.firstname1' => 'required',
            'address1.lastname1' => 'required',
            'address1.gender1' => 'required'
        ]);

        if (Auth::check()) {
            $personId = Auth::user()->person->id;
        } else {
            $name = 'address1';
            if ($request->$name['gender1'] == 'm') {
                $prefix = 'M';
            } elseif ($request->$name['gender1'] == 'f') {
                $prefix = 'Mme';
            } else {
                $prefix = null;
            }
            $personId = Person::insertGetId([
                'firstname' => $request->$name['firstname1'],
                'lastname' => $request->$name['lastname1'],
                'prefix' => $prefix,
                'gender' => $request->$name['gender1'],
            ]);
        }

        // Insert the order address in the database
        $addressId1 = AddressController::store($request, $nb = '1', $id = null, $personId);

        // Insert the shipping address in the database
        $addressId2 = AddressController::store($request, $nb = '2', $addressId1, $personId);

        // Insert the billing address in the database
        $addressId3 = AddressController::store($request, $nb = '3', $addressId1, $personId);

        // Make the sum of all products' quantity and return the right shippingcost
        $shippingCostsID = ShippingCostController::getRigthShippingCost($request);

        $shippingcosts = ShippingCost::where('id', $shippingCostsID)->first();

        // Create the Order
        $orderId = Order::insertGetId([
            'comment' => $request->comment,
            //'delivery_method' => $request->delivery_method,
            'tva' => 7.7,
            'discount' => $request->promotion,
            'payment_method' => $request->payment_method,
            'cgv' => $request->cgv,
            'address_id_1' => $addressId1,
            'address_id_2' => $addressId2,
            'address_id_3' => $addressId3,
            'shipping_cost_id' => $shippingCostsID
        ]);

        // Create all OrderItems needed
        $productTab = OrderItemController::store($request, $orderId);

        $bill = [
            'firstname' => $request->address1['firstname1'],
            'lastname' => $request->address1['lastname1'],
            //'email' => $request->email['email'],
            'street' => $request->address1['street1'],
            'npa' => $request->address1['npa1'],
            'city' => $request->address1['city1'],
            'country' => $request->address1['country1'],
            'products' => $productTab,
            'total' => $this->makeSum($productTab, $shippingcosts->amount)
        ];

        // DELETE CART FROM DATABASE
        if (Auth::check()) {
            $cartItems = Auth::user()->cart->cartItems->all();
            foreach ($cartItems as $cartItem) {
                $cartItem->destroy($cartItem->id);
            }
            $cart = Auth::user()->cart->where('user_id', Auth::id())->first();
            $cart->destroy($cart->id);

            $bill['email'] = Auth::user()->email;
            $this->sendForm($bill);
        }
        if ($request->address1['email'] != null) {
            $bill['email'] = $request->address1['email'];
            $this->sendForm($bill);
        }
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        //
    }

    public function sendForm($bill)
    {
        $billing = $bill;
        $email = $bill['email'];
        Mail::send('viewEmailOrder', ['billing' => $billing], function ($message) use ($email) {
            $message->to($email)->subject('Votre dernière facture 🍷 | Gazzar.ch');
        });
    }

    public static function makeSum($array, $shippingcosts)
    {
        $sum = 0;
        foreach ($array as $key => $item) {
            $sum = $sum + ($item['product']->price * $item['quantity']);
        }
        $sum = $sum + ($sum * 0.077);
        $sum = $sum + $shippingcosts;
        return $sum;
    }
}
