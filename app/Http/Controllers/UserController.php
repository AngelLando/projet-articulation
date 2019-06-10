<?php

namespace App\Http\Controllers;

use Auth;
use App\Address;
use App\Order;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userAddress = Auth::user()->person->address->all();
        //dd($userAddress);
        $orderList = [];
        foreach($userAddress as $address) {
            $orders = Order::where(['address_id_1' => $address->id])->get();
                foreach($orders as $order) {
                    $anOrder = [];
                    $anOrder['no']= $order->id;
                    $anOrder['date']= $order->created_at;
                    $anOrder['discount'] = 10;
                    $anOrder['products'] = [];
                    $anOrder['shipping_status'] = $order->shipping_status;
                    $anOrder['payment_status'] = $order->payment_status;
                    $anOrder['shipping_costs'] = $order->shippingCost->amount;
                    $orderItems = $order->orderItems;
                    $anOrder['total'] = OrderController::makeSum($orderItems, $anOrder['shipping_costs']);
                    $anOrder['total'] -= ($anOrder['total'] * $anOrder['discount'])/100;
                    foreach($orderItems as $orderItem) {
                        //dd($orderItem->product);
                        $aProduct = [];
                        $aProduct['name'] = $orderItem->product->name;
                        $aProduct['price'] = $orderItem->product->price;
                        $aProduct['format'] = $orderItem->product->format->name;
                        $aProduct['packaging_type'] = $orderItem->product->format->packagings->first()['type'];
                        $aProduct['packaging_capacity'] = $orderItem->product->format->packagings->first()['capacity'];
                        $aProduct['image'] = $orderItem->product->path_image;
                        $aProduct['quantity'] = $orderItem->quantity;
                        $aProduct['discount'] = $orderItem->discount;
                        array_push($anOrder['products'], $aProduct);
                    }
                    array_push($orderList, $anOrder);
                }
        }

        $cart = CartController::index();
        $data = [
            'orderList' => $orderList,
            'cart' => $cart,
            'addressess' => $userAddress,
        ];

        $datas = json_encode($data);
        return view('users.account')->with('data', $datas);
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'username' => 'min:3',
            'email' => 'email',
            'password' => 'min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
            'birth_date' => 'date|before:-18 years'
        ]);
    
        $user = Auth::user();

        $user->person->firstname = $request->firstname;
        $user->person->lastname = $request->lastname;

        if($request->gender == 'm') {
            $user->person->prefix = 'M';
        } elseif($request->gender == 'f') {
            $user->person->prefix = 'Mme';
        } else {
            $user->person->prefix = '';
        }

        $user->person->gender = $request->gender;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;

        if($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->person->save();

        return redirect()->back();
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
}
