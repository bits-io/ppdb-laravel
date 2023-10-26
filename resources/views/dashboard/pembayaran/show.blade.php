@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data pembayaran</h1>
    <a href="/pembayaran" class="btn btn-success mb-4"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    <a href="/pembayaran/{{ $pembayaran->id }}/edit" class="btn btn-warning mb-4"><i class="fas fa-fw fa-edit"></i> Edit Status</a>

            <div class="row">
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Data pembayaran</div>
                        <div class="card-body">
                            <p>No pembayaran : {{ $pembayaran->no_pembayaran }}</p>
                            <p>Nama Bank : {{ $pembayaran->nama_bank }}</p>
                            <p>Total Bayar : Rp{{ $pembayaran->total_bayar }}</p>
                            <p>Status : {{ $pembayaran->status }}</p>
                            <p>Bukti : </p>
                            <img src="{{ $pembayaran->bukti }}" alt="" height="200">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Two factor authentication card-->
                    <div class="card mb-4">
                        <div class="card-header">Data Siswa</div>
                        <div class="card-body">
                            {{-- <p>Nomor Pendaftaran : {{ $pembayaran->pendaftaran>no_pendaftaran }}</p> --}}
                            <p>Asal Sekolah : {{ $pembayaran->pendaftaran->asal_sekolah }}</p>
                            <p>Tahun Ajaran : {{ $pembayaran->pendaftaran->tahun_ajaran }}</p>
                            <p>Status Pendaftaran : {{ $pembayaran->pendaftaran->status }}</p>
                        </div>
                    </div>
                </div>

            </div>


</div>

@endsection
