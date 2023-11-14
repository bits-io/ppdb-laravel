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

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Cari Pendaftaran</h1>
            <form action="/find" method="POST">
                @csrf

              <div class="form-floating">
                <input type="find" name="find" class="form-control mb-2 @error('find') is-invalid @enderror"
                    id="find" placeholder="DFTR-11111" autofocus required value="{{ old('find') }}">
                <label for="find">Nomor Pendaftaran</label>

                @error('find')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

              </div>

              <button class="w-100 btn btn-lg btn-success" type="submit">Cari</button>

            </form>
            <small class="d-block text-center mt-3">Not Register? <a href="/register">Register Now!</a></small>

        </main>
    </div>
</div>


@endsection
