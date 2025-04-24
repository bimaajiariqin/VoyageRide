<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function create()
{
    return view('admin.add_cities');
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        City::create([
            'name' => $request->name
        ]);

        return redirect()->route('cities.create')->with('success', 'Kota berhasil ditambahkan!');
    }
}
