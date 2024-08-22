<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;

class MasterKegiatanController extends Controller
{
    public function __construct()
    {
        $this->model = new Kegiatan();
    }

    public function index()
    {
        $kegiatan = $this->model->paginate(25);

        return view('master-kegiatan', compact('kegiatan'));
    }

}
