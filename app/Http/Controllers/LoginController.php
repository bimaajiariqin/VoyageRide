<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login dengan pengecekan role
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            
            if ($user->role == 'Admin') {
                return redirect()->route('/admin/landingadmin');
            } elseif ($user->role == 'AdminUtama') {
                return redirect()->route('/admin/landingadmin');
            }  elseif ($user->role == 'User') {
                return redirect()->route('landing');
            }
        }

        return back()->with('error', 'Email atau password salah.');
    }

    // Menampilkan halaman registrasi
    

    // Proses registrasi
    

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
