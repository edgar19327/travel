<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowPlaceController extends Controller
{
    public function index()
    {
        return view('place');
    }
}
