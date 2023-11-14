@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Cetak siswa</h1>

            <div class="row">
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Cetak siswa</div>
                        <div class="card-body">
                            <form action="/laporan-siswa-cetak" method="GET">

                                {{-- @csrf --}}
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1"  for="dari">Dari Tanggal</label>
                                        <input class="form-control @error('dari') is-invalid @enderror" name="dari" id="sampai" type="date" value="{{ old('dari') }}">

                                        @error('dari')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="sampai">Sampai Tanggal</label>
                                        <input class="form-control @error('sampai') is-invalid @enderror" name="sampai" id="sampai" type="date" value="{{ old('sampai') }}">

                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Save changes button-->
                                <button class="btn btn-success" type="submit">Cetak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

</div>

@endsection
