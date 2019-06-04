<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShippingCostController;

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
        // Insert the order address in the database
        $addressId1 = AddressController::store($request, $nb = '1', $id = null);

        // Insert the shipping address in the database
        $addressId2 = AddressController::store($request, $nb = '2', $addressId1);

        // Insert the billing address in the database
        $addressId3 = AddressController::store($request, $nb = '3', $addressId1);

        // Make the sum of all products' quantity and return the right shippingcost
       // $shippingCosts = ShippingCostController::getRigthShippingCost($request);

        // Create the Order
        $orderId = Order::insertGetId([
            'address_id_1' => $addressId1,
            'address_id_2' => $addressId2,
            'address_id_3' => $addressId3,
            'shipping_cost_id' => 1
        ]);

        // Create all OrderItems needed
        $orderItems = OrderItemController::store($request, $orderId);

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
        //
    }


}
