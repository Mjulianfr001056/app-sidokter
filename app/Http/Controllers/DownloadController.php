<?php

namespace App\Http\Controllers;

class DownloadController extends Controller
{
    public function sampel()
    {
        $filePath = public_path('templates/seeder_sampel_template.xlsx');
        return response()->download($filePath);
    }
}
