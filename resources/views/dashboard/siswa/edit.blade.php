@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit siswa</h1>

            <div class="row">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Edit siswa</div>
                        <div class="card-body">
                            <form action="/siswa/{{ $siswa->id }}" method="POST">
                                @method('put')
                                @csrf
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="nis">Nomor Induk Siswa</label>
                                    <input class="form-control @error('nis') is-invalid @enderror" name="nis" id="nis" type="text" value="{{ old('nis', $siswa->nis) }}">

                                    @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{ old('name', $siswa->name) }}">

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1"  for="tanggal_lahir">Tanggal Lahir</label>
                                        <input class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" type="date" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}">

                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
                                        <input class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" type="text" value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}">

                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </div>
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin</label>

                                        @error('jenis_kelamin')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        <select name="jenis_kelamin" class="form-control mb-2 @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin">

                                            <option value="{{ old('jenis_kelamin', $siswa->jenis_kelamin) }}">{{ old('jenis_kelamin', $siswa->jenis_kelamin) }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="agama">Agama</label>

                                        @error('agama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                        <select name="agama" class="form-control mb-2 @error('agama') is-invalid @enderror" id="agama">
                                            <option value="{{ old('agama', $siswa->agama) }}">{{ old('agama', $siswa->agama) }}</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="asal_sekolah">Asal Sekolah</label>
                                        <input class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" id="asal_sekolah" type="text" value="{{ old('asal_sekolah', $siswa->asal_sekolah) }}">

                                        @error('asal_sekolah')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="tahun_ajaran">Email</label>
                                        <input class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" type="text" value="{{ old('tahun_ajaran', $siswa->tahun_ajaran) }}">

                                        @error('tahun_ajaran')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                    <!-- Form Group (birthday)-->
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="alamat">Alamat</label>
                                    <input class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" type="text" value="{{ old('alamat', $siswa->alamat) }}">

                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" value="{{ old('email', $siswa->email) }}">

                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                    <!-- Form Group (birthday)-->
                                </div>


                                <!-- Save changes button-->
                                <a class="btn btn-outline-success" href="/siswa">Kembali</a>
                                <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</div>

@endsection
