@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit pembayaran</h1>

            <div class="row">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Edit pembayaran</div>
                        <div class="card-body">
                            <form action="/pembayaran/{{ $pembayaran->id }}" method="POST">
                                @method('put')
                                @csrf
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="no_pembayaran">Nomor Pembayaran</label>
                                    <input class="form-control @error('no_pembayaran') is-invalid @enderror" name="no_pembayaran" id="no_pembayaran" type="text" value="{{ old('no_pembayaran', $pembayaran->no_pembayaran) }}" readonly >

                                    @error('nis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="nama_bank">Nama Bank</label>
                                    <input class="form-control @error('nama_bank') is-invalid @enderror" name="nama_bank" id="nama_bank" type="text" value="{{ old('nama_bank', $pembayaran->nama_bank) }}" readonly>

                                    @error('nama_bank')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="bukti">Bukti</label>
                                    <input class="form-control @error('bukti') is-invalid @enderror" name="bukti" id="bukti" type="text" value="{{ old('bukti', $pembayaran->bukti) }}" readonly>
                                    <img class="mt-3 col-lg-6 col-md-6 col-sm-6" src="{{ old('bukti', $pembayaran->bukti) }}" alt="" srcset="">
                                    @error('bukti')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="total_bayar">Tahun Bayar</label>
                                    <input class="form-control @error('total_bayar') is-invalid @enderror" name="total_bayar" id="total_bayar" type="text" value="{{ old('total_bayar', $pembayaran->total_bayar) }}" readonly>

                                    @error('total_bayar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="status">Status</label>
                                    <select name="status" class="form-control mb-2 @error('status') is-invalid @enderror" id="status">

                                        <option value="{{ old('status', $pembayaran->status) }}">{{ old('status', $pembayaran->status) }}</option>
                                        <option value="Proses">Proses</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Bayar">Belum Bayar</option>
                                    </select>

                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <a class="btn btn-outline-success" href="/pembayaran">Kembali</a>
                                <!-- Save changes button-->
                                <button class="btn btn-success" type="submit">Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</div>

@endsection
