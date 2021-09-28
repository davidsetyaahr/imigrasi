<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassportrusakController extends Controller
{
    public function index()
    {
        return view('backend/passport-rusak/p-rusak');
    }
}
