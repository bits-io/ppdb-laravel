@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit pendaftaran</h1>

            <div class="row">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Edit pendaftaran</div>
                        <div class="card-body">
                            <form action="/pendaftaran/{{ $pendaftaran->id }}" method="POST">
                                @method('put')
                                @csrf
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="no_pendaftaran">Nomor Pendaftaran</label>
                                    <input class="form-control @error('no_pendaftaran') is-invalid @enderror" name="no_pendaftaran" id="no_pendaftaran" type="text" value="{{ old('no_pendaftaran', $pendaftaran->no_pendaftaran) }}" readonly >

                                    @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Nama Lengkap</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" value="{{ old('name', $pendaftaran->siswa->name) }}" readonly>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="asal_sekolah">Asal Sekolah</label>
                                    <input class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" id="asal_sekolah" type="text" value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah) }}" readonly>

                                    @error('asal_sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="tahun_ajaran">Tahun Ajaran</label>
                                    <input class="form-control @error('tahun_ajaran') is-invalid @enderror" name="tahun_ajaran" id="tahun_ajaran" type="text" value="{{ old('tahun_ajaran', $pendaftaran->tahun_ajaran) }}" readonly>

                                    @error('tahun_ajaran')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Status</label>
                                    <select name="status" class="form-control mb-2 @error('status') is-invalid @enderror" id="status">

                                        <option value="{{ old('status', $pendaftaran->status) }}">{{ old('status', $pendaftaran->status) }}</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Lulus">Lulus</option>
                                        <option value="Tidak Lulus">Tidak Lulus</option>
                                        <option value="Tidak Lulus">Belum Bayar</option>
                                    </select>

                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</div>

@endsection
