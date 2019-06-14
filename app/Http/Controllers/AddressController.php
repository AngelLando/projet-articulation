<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\Person;
use Auth;

class AddressController extends Controller
{
    protected $address;

    public static function store(Request $request, $nb, $id, $personId)
    {
        $name = 'address' . $nb;
        if ($request->$name == null) {
            return $id;
        }

        if ($request->address2 != null && $nb == 2) {
            if ($request->$name['gender2'] == 'm') {
                $prefix = 'M';
            } elseif ($request->$name['gender2'] == 'f') {
                $prefix = 'Mme';
            } else {
                $prefix = '/';
            }

            $request->validate([
                'address2.street2' => 'required|string',
                'address2.npa2' => 'required|integer|min:1000|max:9999',
                'address2.city2' => 'required|string',
                'address2.region2' => 'required|string',
                'address2.country2' => 'required|string'
            ]);

            $personId = Person::insertGetId([
                'firstname' => $request->$name['firstname2'],
                'lastname' => $request->$name['lastname2'],
                'prefix' => $prefix,
                'gender' => $request->$name['gender2'],
            ]);
        } else if ($request->address3 != null && $nb == 3) {
            if ($request->$name['gender3'] == 'm') {
                $prefix = 'M';
            } elseif ($request->$name['gender3'] == 'f') {
                $prefix = 'Mme';
            } else {
                $prefix = '/';
            }

            $request->validate([
                'address3.street3' => 'required|string',
                'address3.npa3' => 'required|integer|min:1000|max:9999',
                'address3.city3' => 'required|string',
                'address3.region3' => 'required|string',
                'address3.country3' => 'required|string'
            ]);

            $personId = Person::insertGetId([
                'firstname' => $request->$name['firstname3'],
                'lastname' => $request->$name['lastname3'],
                'prefix' => $prefix,
                'gender' => $request->$name['gender3'],
            ]);
        } else {
            $request->validate([
                'address1.street1' => 'required|string',
                'address1.npa1' => 'required|integer|min:1000|max:9999',
                'address1.city1' => 'required|string',
                'address1.region1' => 'required|string',
                'address1.country1' => 'required|string'
            ]);

            $address = Address::where('person_id', $personId)->get()->first();
            if ($address != null && $address->street == $request->address1['street1'] && $address->npa == $request->address1['npa1'] && $address->city == $request->address1['city1'] && $address->region == $request->address1['region1'] && $address->country == $request->address1['country1']) {
                $id = $address->id;
                return $id;
            }
        }

        $id = Address::insertGetId([
            'street' => $request->$name['street' . $nb],
            'npa' => $request->$name['npa' . $nb],
            'city' => $request->$name['city' . $nb],
            'region' => $request->$name['region' . $nb],
            'country' => $request->$name['country' . $nb],
            'person_id' => $personId]);
        return $id;
    }
}