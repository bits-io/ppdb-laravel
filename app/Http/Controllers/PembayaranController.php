<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::latest()->get();

        return view('dashboard.pembayaran.index',[
            'pembayarans' => $pembayarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.show', [
            'pembayaran'=>$pembayaran,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        return view('dashboard.pembayaran.edit', [
            'pembayaran'=>$pembayaran,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'status' => 'required|in:Proses,Lunas,Belum Bayar'
        ]);

        DB::beginTransaction();
        try {
            $pembayaran->status = $request->status;
            $pembayaran->save();

            if($request->status == "Lunas"){
                $siswa = Pendaftaran::where("id", $pembayaran->pendaftaran_id)->first();
                $siswa->status = 'Proses';
                $siswa->save();
            }

            DB::commit();
            return redirect('/pembayaran')->with('success', 'pendaftaran updated');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/pembayaran')->with('error', 'pendaftaran error updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
