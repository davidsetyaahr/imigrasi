<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassporthilangController extends Controller

{
    public function index()
    {
        return view('backend/p_hilang_rusak/p_hilang');
    }
}
