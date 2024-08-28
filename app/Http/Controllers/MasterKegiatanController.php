<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MasterKegiatanController extends Controller
{
    public function __construct()
    {
        $this->model = new Kegiatan();
    }

    public function index()
    {
        $kegiatan = $this->model->paginate(10);

        return view('master-kegiatan', compact('kegiatan'));
    }

    public function create()
    {
        return view('master-kegiatan-create');
    }

    public function store(Request $request)
    {
        if (is_array($request->get('periode'))) {
            $request->merge(['periode' => implode(',', $request->get('periode'))]);
        } elseif ($request->get('periode') === '') {
            $request->merge(['periode' => null]);
        }

        $validatedData = $request->validate([
            'nama' => 'required|string|max:150',
            'asal_fungsi' => 'required|string|max:50',
            'periode' => 'nullable|string|max:50',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date',
            'target' => 'nullable|string|max:50',
            'satuan' => 'required|string|max:30',
            'harga_satuan' => 'nullable|integer',
        ]);

        $this->model->create($validatedData);

        return redirect()->route('master-kegiatan');
    }

    public function edit($id)
    {
        $kegiatan = $this->model->find($id);

        if ($kegiatan->periode) {
            $kegiatan->periode = explode(',', $kegiatan->periode);
        } else {
            $kegiatan->periode = [];
        }

        return view('master-kegiatan-edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = $this->model->find($id);

        if(is_array($request->get('periode'))) {
            $request->merge(['periode' => implode(',', $request->get('periode'))]);
        } elseif ($request->get('periode') === '') {
            $request->merge(['periode' => null]);
        }

        $validatedData = request()->validate([
            'nama' => 'required|string|max:150',
            'asal_fungsi' => 'required|string|max:50',
            'periode' => 'nullable|string|max:50',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_akhir' => 'nullable|date',
            'target' => 'nullable|string|max:50',
            'satuan' => 'required|string|max:30',
            'harga_satuan' => 'nullable|integer',
        ]);

        $kegiatan->update($validatedData);

        return redirect()->route('master-kegiatan');
    }

    public function delete($id)
    {
        $kegiatan = $this->model->find($id);
        $kegiatan->delete();

        return redirect()->route('master-kegiatan');
    }
}
