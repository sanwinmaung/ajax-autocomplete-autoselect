<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function maps()
    {
    	// return "Say Hello!";
    	return view('openlayers');
    }
}
