<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Here you can pass data to the view if needed.
        return view('shop');
    }
}
