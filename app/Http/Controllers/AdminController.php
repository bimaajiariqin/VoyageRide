<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    // Menampilkan form tambah admin
    public function showAddAdmin()
    {
        return view('/admin/add-admin');
    }

    public function index()
{
    return view('/admin/landingadmin');
}

    // Menyimpan Admin baru
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Admin' // Pastikan role selalu Admin
        ]);

        return redirect()->route('/admin/landingadmin')->with('success', 'Admin baru berhasil ditambahkan.');
    }
}
