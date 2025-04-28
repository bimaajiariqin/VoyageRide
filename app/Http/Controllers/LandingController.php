<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('landing', compact('cities'));
    }
}
