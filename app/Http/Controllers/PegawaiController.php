<?php

namespace App\Http\Controllers;

use App\Services\PegawaiService;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function getAll()
    {
        try {
            $result = $this->service->getAll();

            return view('test-page', compact('result'));
        } catch (\Exception $e) {
            return response('<h1>error</h1>', 500)
                ->header('Content-Type', 'text/html');
        }
    }

    public function getById($id)
    {
        try {
            $result = $this->service->getById($id);

            return view('test-page', compact('result'));
        } catch (\Exception $e) {
            // Return a simple error message if the fetch fails
            return response('<h1>error</h1>', 500)
                ->header('Content-Type', 'text/html');
        }
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
