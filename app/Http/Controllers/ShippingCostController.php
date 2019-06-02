<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShippingCostController extends Controller
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
