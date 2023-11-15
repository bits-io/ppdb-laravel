@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data pendaftaran</h1>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-success" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/siswa/create" class="btn btn-success">Tambah pendaftaran</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No Pendaftaran</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Jalur</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No Pendaftaran</th>
                            <th>Nama Siswa</th>
                            <th>Asal Sekolah</th>
                            <th>Jalur</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)

                        <tr>
                            <td>{{ $pendaftaran->no_pendaftaran ?? '-' }}</td>
                            <td>{{ $pendaftaran->siswa->name }}</td>
                            <td>{{ $pendaftaran->siswa->asal_sekolah }}</td>
                            <td>{{ $pendaftaran->jalur }}</td>
                            <td>{{ $pendaftaran->status }}</td>
                            <td>
                                <a href="/pendaftaran/{{ $pendaftaran->id }}" class="btn btn-sm btn-info border-0"><i class="fas fa-fw fa-eye"></i></a>
                                <a href="/pendaftaran/{{ $pendaftaran->id }}/edit" class="btn btn-sm btn-warning border-0"><i class="fas fa-fw fa-edit"></i></a>
                                {{-- <form action="/pendaftaran/{{ $pendaftaran->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="fas fa-fw fa-trash"></i></button>
                                </form> --}}
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
