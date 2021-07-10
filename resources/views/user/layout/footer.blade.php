  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="container">
          <div class="copyright">
            Copyright &copy; <strong>Bantu Gerak {{date("Y")}} </strong>. All Rights Reserved
              {{-- &copy; Copyright <strong>Reveal</strong>. All Rights Reserved --}}
          </div>
          <div class="credits">
              <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Reveal
      -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
          class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('user/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('user/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('user/vendor/wow/wow.min.js')}}"></script>
  <script src="{{asset('user/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('user/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('user/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('user/vendor/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('user/vendor/hoverIntent/hoverIntent.js')}}"></script>
  <script src="{{asset('user/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



  <!-- Template Main JS File -->
  <script src="{{asset('user/js/main.js')}}"></script>

  <script>
    @if(session()->has('success'))
    Toast.fire({
    icon: 'success',
    title: '{{ session('success') }}'
    timer: 3000
    })

    @elseif(session()->has('error'))
    Toast.fire({
    icon: 'error',
    title: '{{ session('error') }}'
    timer: 3000
    })

    @endif

  </script>

  </body>

  </html>
