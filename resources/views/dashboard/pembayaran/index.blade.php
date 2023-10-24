@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data pembayaran</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/siswa/create" class="btn btn-success">Tambah pembayaran</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Pembayaran</th>
                            <th>No Pendaftaran</th>
                            <th>Nama Bank</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No Pembayaran</th>
                            <th>No Pendaftaran</th>
                            <th>Nama Bank</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pembayarans as $pembayaran)

                        <tr>
                            <td>{{ $pembayaran->no_pembayaran }}</td>
                            <td>{{ $pembayaran->pendaftaran->no_pendaftaran }}</td>
                            <td>{{ $pembayaran->nama_bank }}</td>
                            <td>{{ $pembayaran->total_bayar }}</td>
                            <td>{{ $pembayaran->status }}</td>
                            <td>
                                <a href="/pembayaran/{{ $pembayaran->id }}" class="btn btn-sm btn-info border-0"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="/pembayaran/{{ $pembayaran->id }}/edit" class="btn btn-sm btn-warning border-0"><i class="fas fa-fw fa-edit"></i></a>
                                <form action="/pembayaran/{{ $pembayaran->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="fas fa-fw fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
