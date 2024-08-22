<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapaianOrganikController extends Controller
{
    public function index()
    {
        return view('capaian-organik');
    }

    public function showDetail($nama)
    {
        return view('capaian-organik-detail', compact('nama'));
    }

    public function showMitra($nama)
    {
        return view('capaian-organik-mitra', compact('nama'));
    }
}
