<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanSiswa()
    {
        return view('dashboard.laporan.siswa');
    }

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

    public function laporanPendaftaran()
    {
        return view('dashboard.laporan.pendaftaran');
    }

    public function indexLaporanPendaftaran(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        $pendaftarans = Pendaftaran::whereBetween('created_at', [$dari, $sampai])->get();

        return view('dashboard.laporan.cetak-pendaftaran',[
            'dari' => $dari,
            'sampai' => $sampai,
            'pendaftarans' => $pendaftarans
        ]);
    }

    public function laporanPembayaran()
    {
        return view('dashboard.laporan.pembayaran');
    }

    public function indexLaporanPembayaran(Request $request)
    {
        $dari = $request->dari;
        $sampai = $request->sampai;

        $pembayarans = Pembayaran::whereBetween('created_at', [$dari, $sampai])->get();
        $total = Pembayaran::whereBetween('created_at', [$dari, $sampai])->sum('total_bayar');


        return view('dashboard.laporan.cetak-pembayaran',[
            'dari' => $dari,
            'sampai' => $sampai,
            'pembayarans' => $pembayarans,
            'total' => $total
        ]);
    }
}
