<?php

namespace App\Http\Controllers;

use App\Services\PegawaiService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    protected $pegawaiService;

    public function __construct(PegawaiService $pegawaiService)
    {
        $this->pegawaiService = $pegawaiService;
    }

    public function getAll()
    {
        try {
            $result = $this->pegawaiService->getPegawai();

            return view('test-page', compact('result'));
        } catch (\Exception $e) {
            // Return a simple error message if the fetch fails
            return response('<h1>error</h1>', 500)
                ->header('Content-Type', 'text/html');
        }
    }

    public function getById($id)
    {
        try {
            $result = $this->pegawaiService->getPegawaiById($id);

            return view('test-page', compact('result'));
        } catch (\Exception $e) {
            // Return a simple error message if the fetch fails
            return response('<h1>error</h1>', 500)
                ->header('Content-Type', 'text/html');
        }
    }
}
