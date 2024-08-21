<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterKegiatanController extends Controller
{
    public function index()
    {
     return view('daftar-kegiatan');
    }
}
