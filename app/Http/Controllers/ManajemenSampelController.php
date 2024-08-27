<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenSampelController extends Controller
{
    public function index()
    {
        return view('manajemen-sampel');
    }
}
