<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_pembayaran = Pembayaran::count();
        $jumlah_pendaftaran = Pendaftaran::count();
        $jumlah_siswa = Siswa::count();
        $jumlah_uang_pendaftaran = Pembayaran::sum('total_bayar');


        return view('dashboard.index',[
            'jumlah_pembayaran' => $jumlah_pembayaran,
            'jumlah_pendaftaran' => $jumlah_pendaftaran,
            'jumlah_siswa' => $jumlah_siswa,
            'jumlah_uang_pendaftaran' => $jumlah_uang_pendaftaran,
        ]);
    }
}
