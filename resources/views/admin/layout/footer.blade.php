<footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2021 <div class="bullet"></div>
      Bantu Gerak
       {{-- TEMPLATE BY STISLA 2.0.2  --}}
      {{-- Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a> --}}
    </div>
    <div class="footer-right">

    </div>
  </footer>
</div>
</div>



<!-- General JS Scripts -->
<script src="{{asset('backend/modules/jquery.min.js')}}"></script>
<script src="{{asset('backend/modules/popper.js')}}"></script>
<script src="{{asset('backend/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('backend/modules/moment.min.js')}}"></script>
<script src="{{asset('backend/js/stisla.js')}}"></script>
<script src="{{asset('backend/modules/tooltip.js')}}"></script>

  <!-- JS Libraies -->
@stack('js-libraries')

<!-- Page Specific JS File -->
<script src="{{asset('backend/js/page/index.js')}}"></script>

  <!-- Custom JS File -->
  @stack('customjs')

<!-- Template JS File -->
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/custom.js')}}"></script>

<script>
    @if(session()->has('success'))

    Swal.fire({
        icon: 'success',
        title: 'BERHASIL!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000
    })

    @elseif(session()->has('error'))

    Swal.fire({
        icon: 'error',
        text: 'GAGAL!',
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 3000
    })

    @endif
</script>
</body>
</html>
