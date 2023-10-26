@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data pendaftaran</h1>
    <a href="/pendaftaran" class="btn btn-success mb-4"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    <a href="/pendaftaran/{{ $pendaftaran->id }}/edit" class="btn btn-warning mb-4"><i class="fas fa-fw fa-edit"></i> Edit Status</a>

            <div class="row">
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Data pendaftaran</div>
                        <div class="card-body">
                            <p>No Pendaftaran : {{ $pendaftaran->no_pendaftaran }}</p>
                            <p>Asal Sekolah : {{ $pendaftaran->asal_sekolah }}</p>
                            <p>Tahun Ajaran : {{ $pendaftaran->tahun_ajaran }}</p>
                            <p>Status : {{ $pendaftaran->status }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Data Siswa</div>
                        <div class="card-body">
                            <p>Nomor Induk Siswa : {{ $pendaftaran->siswa->nis }}</p>
                            <p>Nama : {{ $pendaftaran->siswa->name }}</p>
                            <p>Jenis Kelamin : {{ $pendaftaran->siswa->jenis_kelamin }}</p>
                            <p>Alamat : {{ $pendaftaran->siswa->alamat }}</p>
                        </div>
                    </div>
                </div>

            </div>


</div>

@endsection
