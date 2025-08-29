<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index()
    {
        return view('assets.asset');
    }
}
