<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Person;
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
         $shippingCosts = ShippingCostController::getRigthShippingCost($request);

         // Create the Order
         $orderId = Order::insertGetId([
             'comment' => $request->comment,
             //'delivery_method' => $request->delivery_method,
             'tva' => 7.7,
             'discount' => $request->promotion,
             'payment_method' => $request->payment_method,
             'address_id_1' => $addressId1,
             'address_id_2' => $addressId2,
             'address_id_3' => $addressId3,
             'shipping_cost_id' => $shippingCosts
         ]);

         // Create all OrderItems needed
         $orderItems = OrderItemController::store($request, $orderId);

         $form = Order::sendForm($request);

         // return OrderId

        return $orderItems;
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

    public function sendForm($request) {

        Mail::send('viewEmailOrder', $request->all(), function($message){
            $message->to('')->subject('Laravel (Contact)');
        });
        return 'Ok';

    }
}
