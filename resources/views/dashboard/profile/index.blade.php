@extends('dashboard.layouts.main')

@section('container')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Profile</h1>

            <div class="row">
                <div class="col-xl-8">
                  <!-- Account details card-->
                  <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                      <form action="/profile/{{ $user->id }}" method="POST">
                        @method('put')
                        @csrf
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                          <label class="small mb-1" for="name">Name</label>
                          <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" readonly>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                          <label class="small mb-1" for="email">Email address</label>
                          <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $user->email) }}" readonly>
                        </div>

                        {{-- <div class="mb-3">
                          <label class="small mb-1" for="password">Password</label>
                          <input class="form-control" id="password" name="password" type="password">
                        </div> --}}
                        <!-- Save changes button-->
                        {{-- <button class="btn btn-success" type="submit">Simpan perubahan</button> --}}
                      </form>
                    </div>
                  </div>
                </div>
              </div>

</div>

@endsection
