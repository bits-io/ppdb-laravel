@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data siswa</h1>
    <a href="/siswa" class="btn btn-success mb-4"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    <a href="/siswa/{{ $siswa->id }}/edit" class="btn btn-warning mb-4"><i class="fas fa-fw fa-edit"></i> Edit</a>

            <div class="row">
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Data Siswa</div>
                        <div class="card-body">
                            <p>NIS : {{ $siswa->nis }}</p>
                            <p>Nama : {{ $siswa->name }}</p>
                            <p>Tanggal Lahir : {{ $siswa->tanggal_lahir }}</p>
                            <p>Tempat Lahir : {{ $siswa->tempat_lahir }}</p>
                            <p>Jenis Kelamin : {{ $siswa->jenis_kelamin }}</p>
                            <p>Agama : {{ $siswa->agama }}</p>
                            <p>Alamat : {{ $siswa->alamat }}</p>
                            <p>Email : {{ $siswa->email }}</p>
                            <p>Asal Sekolah : {{ $siswa->asal_sekolah }}</p>
                            <p>Tahun Ajaran : {{ $siswa->tahun_ajaran }}</p>
                            <p>Status : {{ $siswa->status }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Data Orang tua</div>
                        <div class="card-body">
                            <p>Nama : {{ $siswa->orangtua->nama }}</p>
                            <p>Pekerjaan : {{ $siswa->orangtua->pekerjaan }}</p>
                            <p>Penghasilan : {{ $siswa->orangtua->penghasilan }}</p>
                            <p>No HP : {{ $siswa->orangtua->no_hp_orangtua }}</p>
                        </div>
                    </div>
                </div>

            </div>


</div>

@endsection
