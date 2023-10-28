<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function indexLaporanSiswa(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        $siswas = Siswa::whereBetween('created_at', [$dari, $sampai])->get();

        return view('dashboard.laporan.cetak-siswa',[
            'dari' => $dari,
            'sampai' => $sampai,
            'siswas' => $siswas
        ]);
    }

    public function laporanSiswa()
    {
        return view('dashboard.laporan.siswa');
    }
}
