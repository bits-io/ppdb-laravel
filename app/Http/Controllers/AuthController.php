<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login', [
            'title'=> 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Login failed!');
    }

    public function indexRegister()
    {
        return view('auth.register', [
            'title'=> 'Register'
        ]);
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required',

            'asal_sekolah' => 'required',
            'tahun_ajaran' => 'required',

            'nama_orangtua' => 'required',
            'penghasilan' => 'required|numeric',
            'pekerjaan' => 'required',
            'no_hp_orangtua' => 'required'
        ]);

        DB::beginTransaction();

        try {
            $siswa = new Siswa();
            $siswa->name = $request->input('nama_lengkap');
            $siswa->tempat_lahir = $request->input('tempat_lahir');
            $siswa->tanggal_lahir = date("Y-m-d", strtotime($request->input('tanggal_lahir')));
            $siswa->jenis_kelamin = $request->input('jenis_kelamin');
            $siswa->agama = $request->input('agama');
            $siswa->alamat = $request->input('alamat');
            $siswa->email = $request->input('email');
            $siswa->password = Hash::make($request->input('password'));
            $siswa->save();

            $orangtua = new OrangTua();
            $orangtua->id_siswa = $siswa->id;
            $orangtua->nama_orangtua = $request->input('nama_orangtua');
            $orangtua->penghasilan = $request->input('penghasilan');
            $orangtua->pekerjaan = $request->input('pekerjaan');
            $orangtua->no_hp_orangtua = $request->input('no_hp_orangtua');
            $orangtua->save();

            $pendaftaran = new Pendaftaran();
            $pendaftaran->id_siswa = $siswa->id;



            DB::commit();
            return redirect('/login')->with('success', 'Registration Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/register')->with('error', 'Registration Failed!');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
