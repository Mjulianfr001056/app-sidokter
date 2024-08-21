<?php

namespace App\Http\Controllers;

class BebanKerjaOrganikController extends Controller
{
    public function index()
    {
        $labels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
            'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        // Dummy data representing some values for each month
        $value = [
            rand(10, 100), rand(20, 150), rand(30, 200), rand(40, 250),
            rand(50, 300), rand(60, 350), rand(70, 400), rand(80, 450),
            rand(90, 500), rand(100, 550), rand(110, 600), rand(120, 650)
        ];

        return view('beban-kerja-organik', compact('labels', 'value'));
    }
}
