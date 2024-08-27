<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
class PenugasanController extends Controller
{
    public function index()
    {
        $penugasan_tim = Collection::make([
            (object)[
                'rank' => 1,
                'nama' => 'John Doe',
                'jumlah_kegiatan' => 5,
            ],
            (object)[
                'rank' => 2,
                'nama' => 'Jane Smith',
                'jumlah_kegiatan' => 3,
            ],
            (object)[
                'rank' => 3,
                'nama' => 'Alice Johnson',
                'jumlah_kegiatan' => 7,
            ],
            (object)[
                'rank' => 4,
                'nama' => 'Bob Brown',
                'jumlah_kegiatan' => 2,
            ],
            (object)[
                'rank' => 5,
                'nama' => 'Carol Davis',
                'jumlah_kegiatan' => 6,
            ],
            (object)[
                'rank' => 6,
                'nama' => 'David Wilson',
                'jumlah_kegiatan' => 4,
            ],
            (object)[
                'rank' => 7,
                'nama' => 'Eve Taylor',
                'jumlah_kegiatan' => 8,
            ],
            (object)[
                'rank' => 8,
                'nama' => 'Frank Miller',
                'jumlah_kegiatan' => 3,
            ],
            (object)[
                'rank' => 9,
                'nama' => 'Grace Lee',
                'jumlah_kegiatan' => 1,
            ],
            (object)[
                'rank' => 10,
                'nama' => 'Hank Martinez',
                'jumlah_kegiatan' => 2,
            ],
        ]);

        return view('beban-kerja-tugas', compact('penugasan_tim'));
    }
}
