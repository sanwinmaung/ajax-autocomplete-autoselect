<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Township;
use App\Address;

use App\Http\Requests\StoreAddress;

class AddressController extends Controller
{
    public function create()
    {
    	$cities = City::orderBy('city')->get(['id', 'city']);
    	return view('address.create', compact('cities'));
    }

    public function store(StoreAddress $request)
    {
    	$input = $request->all();
    	$address = Address::create($input);
    	return back();
    }

    public function searchTownshipByCity()
    {
    	$id = request()->city_id;
    	$townships = Township::where('city_id', $id)->orderby('township')->get(['id', 'city_id', 'township']);
    	return response()->json($townships);
    }

    public function searchAddress(Request $request)
    {
        $term = $request->term;
        $data = Address::where('address','LIKE','%'. $term .'%')->take(10)->get();
        $results = [];
        foreach ($data as $key => $v) {
          $results[] = [ 'id' => $v->id, 'value' => $v->address ];
        }
        return response()->json($results);
    }

    public function searchCityByAddress()
    {
        $address = Address::where('id', request()->id)->first();
        return response()->json($address);
    }

}
