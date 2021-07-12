<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>404 &mdash; Bantu Gerak</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              The page you were looking for could not be found.
            </div>
            <div class="page-search">
              <form>
                <div class="form-group floating-addon floating-addon-not-append">
                  <div class="input-group">
                    <div class="input-group-prepend">
                    </div>
                  </div>
                </div>
              </form>
              <div class="mt-3">
                <a href="{{route('user.landingpage.index')}}">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          {{-- Copyright &copy; Stisla 2018 --}}
          Copyright &copy; Bantu Gerak {{date("Y")}}
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('backend/modules/jquery.min.js')}}"></script>
  <script src="{{asset('backend/modules/popper.js')}}"></script>
  <script src="{{asset('backend/modules/tooltip.js')}}"></script>
  <script src="{{asset('backend/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('backend/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('backend/modules/moment.min.js')}}"></script>
  <script src="{{asset('backend/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{asset('backend/js/scripts.js')}}"></script>
  <script src="{{asset('backend/js/custom.js')}}"></script>
</body>
</html>
