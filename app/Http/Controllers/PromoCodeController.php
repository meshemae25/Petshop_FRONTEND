<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function index()
    {
        return view('promocodes.index'); // Ensure the view exists
    }
}
