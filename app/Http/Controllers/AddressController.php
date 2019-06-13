<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{
    protected $address;

    public static function store(Request $request, $nb, $id, $personId)
    {
        $name = 'address'.$nb;
        if($request->$name == null) {
            return $id;
        }

        $request->validate([
            'address1.street1' => 'required|string',
            'address1.npa1' => 'required|integer|min:1000|max:9999',
            'address1.city1' => 'required|string',
            'address1.region1' => 'required|string',
            'address1.country1' => 'required|string'
        ]);

        $id = Address::insertGetId([
            'street' => $request->$name['street'.$nb],
            'npa' => $request->$name['npa'.$nb],
            'city' => $request->$name['city'.$nb],
            'region' => $request->$name['region'.$nb],
            'country' => $request->$name['country'.$nb],
            'person_id' => $personId]);
        return $id;
    }
}