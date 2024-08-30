<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterPerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = DB::table('perusahaan')
            ->join('wilayah', 'perusahaan.kode_wilayah', '=', 'wilayah.kode')
            ->select('perusahaan.*', 'wilayah.*')
            ->paginate(25);

        return view('master-perusahaan', compact('perusahaan'));
    }

    public function create()
    {
        $wilayah = Wilayah::select('kecamatan', 'kelurahan')
            ->get()
            ->groupBy('kecamatan')
            ->map(function ($group) {
                return $group->pluck('kelurahan')->toArray();
            })
            ->toArray();

        return view('master-perusahaan-create', compact('wilayah'));
    }

    public function store(Request $request)
    {
        $wilayah = DB::table('wilayah')
            ->where('kecamatan', $request->input('kecamatan'))
            ->where('kelurahan', $request->input('kelurahan'))
            ->first();

        $request->merge(['kode_wilayah' => $wilayah->kode]);

        Perusahaan::create($request->except(['_token','_method', 'kecamatan', 'kelurahan']));
        return redirect()->route('master-perusahaan');
    }

    public function edit($id)
    {
        $perusahaan = DB::table('perusahaan')
            ->join('wilayah', 'perusahaan.kode_wilayah', '=', 'wilayah.kode')
            ->select('perusahaan.*', 'wilayah.*')
            ->where('perusahaan.id', $id)
            ->first();

        $wilayah = Wilayah::select('kecamatan', 'kelurahan')
            ->get()
            ->groupBy('kecamatan')
            ->map(function ($group) {
                return $group->pluck('kelurahan')->toArray();
            })
            ->toArray();

        return view('master-perusahaan-edit', compact('perusahaan', 'wilayah'));
    }

    public function update(Request $request, $id)
    {
        $wilayah = DB::table('wilayah')
            ->where('kecamatan', $request->input('kecamatan'))
            ->where('kelurahan', $request->input('kelurahan'))
            ->first();

        $request->merge(['kode_wilayah' => $wilayah->kode]);

        Perusahaan::find($id)->update($request->except(['_token','_method', 'kecamatan', 'kelurahan']));

        return redirect()->route('master-perusahaan');
    }


    public function delete($id)
    {
        Perusahaan::where('id', $id)->delete();
        return redirect()->route('master-perusahaan');
    }
}
