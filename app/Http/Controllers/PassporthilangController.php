<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassporthilangController extends Controller

{
    public function index()
    {
        return view('backend/passport-hilang/p-hilang');
    }
}