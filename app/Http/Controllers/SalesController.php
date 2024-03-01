<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function showPOS()
    {
        return view('sales.pos');
    }
}