<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterOrganikController extends Controller
{
    public function index()
    {
        return view('master-organik');
    }
}
