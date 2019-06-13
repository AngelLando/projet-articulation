<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Session;
use App\User;
use App\Address;
use App\Order;
use App\Cart;
use App\CartItem;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $userAddress = Auth::user()->person->address->all();
        $orderList = [];
        foreach ($userAddress as $address) {
            $orders = Order::where(['address_id_1' => $address->id])->get();
            foreach ($orders as $order) {
                $anOrder = [];
                $anOrder['no'] = $order->id;
                $anOrder['date'] = $order->created_at;
                $anOrder['discount'] = 10;
                $anOrder['products'] = [];
                $anOrder['shipping_status'] = $order->shipping_status;
                $anOrder['payment_status'] = $order->payment_status;
                $anOrder['shipping_costs'] = $order->shippingCost->amount;
                $orderItems = $order->orderItems;
                $anOrder['total'] = OrderController::makeSum($orderItems, $anOrder['shipping_costs']);
                $anOrder['total'] -= ($anOrder['total'] * $anOrder['discount']) / 100;
                foreach ($orderItems as $orderItem) {
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

        $cart = CartController::index($require = null);
        $user = Auth::user();

        $data = [
            'orderList' => $orderList,
            'cart' => $cart,
            'addressess' => $userAddress,
            'user' => $user,
        ];

        $datas = json_encode($data);
        return view('users.account')->with('data', $datas);
    }

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

        if ($request->gender == 'm') {
            $user->person->prefix = 'M';
        } elseif ($request->gender == 'f') {
            $user->person->prefix = 'Mme';
        } else {
            $user->person->prefix = '';
        }

        $user->person->gender = $request->gender;

        $user->username = $request->username;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->person->save();

        Session::flash('success', 'Utilisateur mis à jour!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $cart = Cart::where('user_id', $id)->first();
        if ($cart != null) {
            $cartItems = CartItem::where('cart_id', $cart->id)->get()->all();
            foreach ($cartItems as $cartItem) {
                CartItem::destroy($cartItem->id);
            }
            Cart::destroy($cart->id);
        }
        Auth::logout();
        $user = User::where('id', $id)->get()->first();
        User::destroy($user->id);
        return 1;
    }
}