<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftarans = Pendaftaran::latest()->get();

        return view('dashboard.pendaftaran.index',[
            'pendaftarans' => $pendaftarans
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
    public function show(Pendaftaran $pendaftaran)
    {
        return view('dashboard.pendaftaran.show', [
            'pendaftaran'=>$pendaftaran
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        return view('dashboard.pendaftaran.edit', [
            'pendaftaran'=>$pendaftaran
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status' => 'required|in:Proses,Lulus,Tidak Lulus,Belum Bayar'
        ]);

        DB::beginTransaction();
        try {
            $pendaftaran->status = $request->status;
            $pendaftaran->admin_id = session()->get('user')->id;
            $pendaftaran->save();

            if($request->status == "Lulus"){
                $siswa = Siswa::where("id", $pendaftaran->siswa_id)->first();
                $siswa->status = 'Lulus';
                $siswa->save();
            }

            DB::commit();
            return redirect('/pendaftaran')->with('success', 'pendaftaran updated');

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/pendaftaran')->with('error', 'pendaftaran error updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }

    public function get($no)
    {
        $pendaftaran = Pendaftaran::where('no_pendaftaran', $no)->first();
        // $pembayaran = Pembayaran::where('pendaftaran_id', $pendaftaran->id)->first();

        return view('dashboard.pendaftaran.get', [
            'pendaftaran' => $pendaftaran
        ]);
    }
}
