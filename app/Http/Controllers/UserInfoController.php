<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;
use App\City;
use App\Township;
use App\Address;

use App\Http\Requests\StoreUserInfo;

class UserInfoController extends Controller
{
    public function create()
    {
    	$cities = City::orderBy('city')->get(['id', 'city']);
    	$townships = Township::orderby('city_id')->orderby('township')->get(['id', 'city_id', 'township']);
    	return view('userinfo.create', compact('cities', 'townships'));
    }

    public function store(StoreUserInfo $request)
    {
    	$input = $request->all();
    	$userinfo = UserInfo::create($input);
    	return back();
    }
}
