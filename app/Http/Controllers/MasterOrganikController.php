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

    public function create()
    {
        return view('master-organik-create');
    }

    public function store(Request $request)
    {
        Pegawai::create($request->except('_token', '_method'));
        return redirect()->route('master-organik');
    }

    public function edit($id)
    {
        $pegawai = $this->model->find($id);
        return view('master-organik-edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        Pegawai::where('id', $id)->update($request->except('_token', '_method'));
        return redirect()->route('master-organik');
    }

    public function delete($id)
    {
        Pegawai::where('id', $id)->delete();
        return redirect()->route('master-organik');
    }
}
