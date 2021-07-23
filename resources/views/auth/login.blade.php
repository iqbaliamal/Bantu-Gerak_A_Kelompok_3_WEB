<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Bantu Gerak</title>


  {{-- CSRF Token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/modules/fontawesome/css/all.min.css')}}">


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <a href="{{route('user.landingpage.index')}}">
              <img src="{{ asset('user/img/logo.png') }}" alt="logo" width="80" class="shadow-light rounded-circle">
            </a>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

            @if(session()->has('pesan-error'))
            <div class="container">
                <div class="alert alert-danger">
                    {{ session()->get('pesan-error') }}
                </div>
            </div>
            @endif

              <div class="card-body">
              <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf
                  <!-- Custom -->
                  <div class="form-group">
                      <label for="email">{{ __('E-Mail Address') }}</label>

                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <div class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </div>
                          @enderror
                  </div>
                  <!-- End Custom -->

                  <!-- Custom -->
                  <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <!-- End Custom -->

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" tabindex="3" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="remember">Remember Me</label>

                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

                {{-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> --}}

              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Belum punya akun? <a href="{{route('register')}}">Daftar disini</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Bantu Gerak {{date("Y")}}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- General JS Scripts -->
<script src="{{asset('backend/modules/jquery.min.js')}}"></script>
<script src="{{asset('backend/modules/popper.js')}}"></script>
<script src="{{asset('backend/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('backend/modules/moment.min.js')}}"></script>
<script src="{{asset('backend/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
