@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1>
            <form action="/register" method="POST" enctype="multipart/form-data">
                @csrf

                <h5 class="mt-3 mb-3">Data Siswa</h5>
              <div class="form-floating">
                <input value="{{ old('email') }}" type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
                <label for="email">Email address</label>

                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              {{-- <div class="form-floating">
                <input type="password" name="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                <label for="password">Password</label>

                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div> --}}

              <div class="form-floating">
                <input value="{{ old('nis') }}" type="number" name="nis" class="form-control mb-2 @error('nis') is-invalid @enderror" id="nis" placeholder="Nama Lengkap">
                <label for="nis">NIS</label>

                @error('nis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('nama_lengkap') }}" type="text" name="nama_lengkap" class="form-control mb-2 @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap">
                <label for="nama_lengkap">Nama Lengkap</label>

                @error('nama_lengkap')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('tempat_lahir') }}" type="text" name="tempat_lahir" class="form-control mb-2 @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" placeholder="Tempat Lahir">
                <label for="tempat_lahir">Tempat Lahir</label>

                @error('tempat_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('tanggal_lahir') }}" type="date" name="tanggal_lahir" class="form-control mb-2 @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal Lahir">
                <label for="tanggal_lahir">Tanggal Lahir</label>

                @error('tanggal_lahir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <select name="jenis_kelamin" class="form-control mb-2 @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label for="jenis_kelamin">Agama</label>

                @error('jenis_kelamin')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <select name="agama" class="form-control mb-2 @error('agama') is-invalid @enderror" id="agama">
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                </select>
                <label for="agama">Agama</label>

                @error('agama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('alamat') }}" type="text" name="alamat" class="form-control mb-2 @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat">
                <label for="alamat">Alamat</label>

                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>

              <h5 class="mt-3 mb-3">Data Sekolah</h5>
              <div class="form-floating">
                <input value="{{ old('asal_sekolah') }}" type="text" name="asal_sekolah" class="form-control mb-2 @error('asal_sekolah') is-invalid @enderror" id="asal_sekolah" placeholder="Asal Sekolah">
                <label for="asal_sekolah">Asal Sekolah</label>

                @error('asal_sekolah')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('tahun_ajaran') }}" type="number" name="tahun_ajaran" class="form-control mb-2 @error('tehun_ajaran') is-invalid @enderror" id="tahun_ajaran" placeholder="Tahun Ajaran">
                <label for="tahun_ajaran">Tahun Ajaran</label>

                @error('tahun_ajaran')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>

              <h5 class="mt-3 mb-3">Data Orang Tua</h5>
              <div class="form-floating">
                <input value="{{ old('nama_orangtua') }}" type="text" name="nama_orangtua" class="form-control mb-2 @error('nama_orangtua') is-invalid @enderror" id="nama_orangtua" placeholder="Nama Orang Tua">
                <label for="nama_orangtua">Nama Orang Tua</label>

                @error('nama_orangtua')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('pekerjaan') }}" type="text" name="pekerjaan" class="form-control mb-2 @error('pekerjaan') is-invalid @enderror" id="pekerjaan" placeholder="Pekerjaan">
                <label for="pekerjaan">Pekerjaan</label>

                @error('pekerjaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('penghasilan') }}" type="number" name="penghasilan" class="form-control mb-2 @error('penghasilan') is-invalid @enderror" id="penghasilan" placeholder="2000000">
                <label for="penghasilan">Penghasilan</label>

                @error('penghasilan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input value="{{ old('no_hp_orangtua') }}" type="number" name="no_hp_orangtua" class="form-control mb-2 @error('no_hp_orangtua') is-invalid @enderror" id="no_hp_orang_tua" placeholder="083223232">
                <label for="no_hp_orang_tua">No HP</label>

                @error('no_hp_orang_tua')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>

              <h5 class="mt-3 mb-3">Data Pembayaran</h5>
              <div class="form-floating">
                <select name="nama_bank" class="form-control mb-2 @error('nama_bank') is-invalid @enderror" id="nama_bank">
                    <option value="">Pilih Bank</option>
                    <option value="Bank Syariah Indonesia">Bank Syariah Indonesia</option>
                </select>
                <label for="nama_bank">Bank</label>

                @error('nama_bank')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>
              <div class="form-floating">
                <input type="file" name="bukti" class="form-control mb-2 @error('bukti') is-invalid @enderror" id="bukti" placeholder="Bukti">
                <label for="bukti">Bukti</label>

                @error('bukti')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>

              <button class="mb-5 w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>

            </form>
            {{-- <small class="d-block text-center mt-3 mb-5">Have an account? <a href="/login">Login Now!</a></small> --}}

        </main>
    </div>
</div>


@endsection
