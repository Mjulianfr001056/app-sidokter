<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BebanKerjaMitraController extends Controller
{
    public function index()
    {
        $labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        // Dummy data representing some values for each month
        $value = [
            rand(0, 4000000), rand(0, 4000000), rand(0, 4000000), rand(0, 4000000),
            rand(0, 4000000), rand(0, 4000000), rand(0, 4000000), rand(0, 4000000),
            rand(0, 4000000), rand(0, 4000000), rand(0, 4000000), rand(0, 4000000)
        ];

        return view('beban-kerja-mitra', compact('labels', 'value'));
    }
}
