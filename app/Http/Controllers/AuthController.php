<?php

namespace App\Http\Controllers;

use App\Models\OrangTua;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $findUser = User::where('email', $request->email)->first();

        if (!$findUser) {
            return back()->with('error', 'Login failed!');
        }

        if (Auth::attempt($credentials) && $findUser) {
            $request->session()->regenerate();

            session()->put('login', true);
            session()->put('role', 'Admin');
            session()->put('user', $findUser);

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
            'nis' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'email' => 'required|unique:siswas|email',
            'password' => 'required',

            'asal_sekolah' => 'required',
            'tahun_ajaran' => 'required',

            'nama_orangtua' => 'required',
            'penghasilan' => 'required|numeric',
            'pekerjaan' => 'required',
            'no_hp_orangtua' => 'required',

            'nama_bank' => 'required',
            'bukti' => 'required|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $siswa = new Siswa();
            $siswa->nis = $request->input('nis');
            $siswa->name = $request->input('nama_lengkap');
            $siswa->tempat_lahir = $request->input('tempat_lahir');
            $siswa->tanggal_lahir = date("Y-m-d", strtotime($request->input('tanggal_lahir')));
            $siswa->jenis_kelamin = $request->input('jenis_kelamin');
            $siswa->agama = $request->input('agama');
            $siswa->alamat = $request->input('alamat');
            $siswa->email = $request->input('email');
            $siswa->password = Hash::make($request->input('password'));
            $siswa->status = 'Tidak Lulus';
            $siswa->save();

            $orangtua = new OrangTua();
            $orangtua->siswa_id = $siswa->id;
            $orangtua->nama = $request->input('nama_orangtua');
            $orangtua->penghasilan = $request->input('penghasilan');
            $orangtua->pekerjaan = $request->input('pekerjaan');
            $orangtua->no_hp_orangtua = $request->input('no_hp_orangtua');
            $orangtua->save();

            $pendaftaran = new Pendaftaran();
            $pendaftaran->siswa_id = $siswa->id;
            $pendaftaran->asal_sekolah = $request->input('asal_sekolah');
            $pendaftaran->tahun_ajaran = $request->input('tahun_ajaran');
            $pendaftaran->status = "Proses";
            $pendaftaran->save();

            $totalBayar = 50000;

            $pembayaran = new Pembayaran();
            $pembayaran->pendaftaran_id = $pendaftaran->id;
            $pembayaran->nama_bank = $request->nama_bank;
            $pembayaran->total_bayar = $totalBayar;
            $pembayaran->status = "Proses";

            if ($request->hasFile('bukti')) {

                $bukti = $request->file('bukti');

                $filename = Storage::disk('public')->put('pembayaran/bukti', $bukti);

                // Custom name
                // $customName = '/pembayaran/bukti/' . $request->input('nis') . '-' . Str::slug($request->input('nama_lengkap')) . '-' . date('Ymdhis') . '.' . $bukti->getClientOriginalExtension();
                // Storage::move($filename, 'public/pembayaran/bukti/' . $customName);

                $pembayaran->bukti = $filename;

            }

            $pembayaran->save();



            DB::commit();
            return redirect("/pendaftaran/".$pendaftaran->no_pendaftaran )->with('success', 'Registration Successfully!');
        } catch (\Throwable $th) {

            DB::rollBack();
            throw $th;
            // return redirect('/register')->with('error', 'Registration Failed!');
        }


    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flush();

        return redirect('/');
    }

    public function indexFind()
    {
        return view('auth.find',[
            'title' => 'Cari Pendaftaran'
        ]);
    }

    public function find(Request $request)
    {
        $request->validate([
            'find' => 'required',
        ]);

        $pendaftaran = Pendaftaran::where('no_pendaftaran', $request->find)->first();
        if (!$pendaftaran) {
            return back()->with('error', 'Nomor not found!');
        }

        return redirect("/pendaftaran/".$request->find )->with('success', 'Registration Successfully!');
    }
}
