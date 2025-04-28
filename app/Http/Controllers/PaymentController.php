<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        // Simulasi pembayaran sukses
        return view('payment_success');
    }
}
