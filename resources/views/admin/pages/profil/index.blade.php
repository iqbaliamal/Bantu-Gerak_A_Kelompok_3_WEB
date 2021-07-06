@extends('admin.layout.master')

@section('title', 'EditProfil')

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit User Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Edit User Profile</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                  <div class="d-flex justify-content-center">
                      <img src="{{asset(Auth::user()->avatar)}}"  alt="foto" height="300px">
                  </div>
                <form action="#" method="post" enctype="multipart/form-data">
                {{-- <form action="{{route('updateProfile.user', ['id' => $profil->id_users])}}" method="post" enctype="multipart/form-data"> --}}
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="#">
                    @error('username')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" readonly>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                  </div>
                  <p class="text-danger" role="alert">
                      <strong>Password hanya dapat diubah satu kali</strong>
                  </p>
                  <div class="row">
                      <div class="col">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{ old('password') }}" required>
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>

                      </div>
                      <div class="col">
                          <div class="form-group">
                              <label>Passsword Confirmation</label>
                              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                              @error('password_confirmation')
                              <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>
                      </div>
                  </div>


                  <div class="form-group">
                    <button type="submit" name="btn" class="btn btn-primary">Edit</button>
                  </div>
                </form>



              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
