<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswas = Siswa::latest();

        if ($request->status) {
            $siswas = $siswas->where('status', $request->status);
        }

        $siswas = $siswas->get();

        return view('dashboard.siswa.index',[
            'siswas' => $siswas
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
    public function show(Siswa $siswa)
    {
        return view('dashboard.siswa.show',[
            'siswa'=>$siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('dashboard.siswa.edit', [
            'siswa' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|max:255|unique:siswas,nis,' . $siswa->id,
            'name' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|max:255',
            'jenis_kelamin' => 'required|max:255',
            'agama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'asal_sekolah' => 'required|max:255',
            'tahun_ajaran' => 'required|max:255',
            'email' => 'required|max:255|email',

        ]);

        $siswa->nis = $request->nis;
        $siswa->name = $request->name;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->tahun_ajaran = $request->tahun_ajaran;
        $siswa->alamat = $request->alamat;

        $siswa->save();

        return redirect('/siswa')->with('success', 'siswa updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
