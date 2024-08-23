<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class MasterOrganikController extends Controller
{
    public function __construct()
    {
        $this->model = new Pegawai();
    }
    public function index()
    {
        $pegawai = $this->model->paginate(25);
        return view('master-organik', compact('pegawai'));
    }

    public function view()
    {
        $pegawai = $this->model->all();
        return view('organik-view', compact('pegawai'));
    }

    public function delete($id)
    {
//        $pegawai = $this->model->find($id);
//        $pegawai->delete();
//        return redirect()->route('master-organik')->with('success', 'Data berhasil dihapus.');
    }
}
