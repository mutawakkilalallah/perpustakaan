<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Maktabah - {{ $title }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="/assets/plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Ionicons -->
    <link
      rel="stylesheet"
      href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
    />
    <!-- Tempusdominus Bootstrap 4 -->
    <link
      rel="stylesheet"
      href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"
    />
    <!-- iCheck -->
    <link
      rel="stylesheet"
      href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link
      rel="stylesheet"
      href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"
    />
    <!-- Daterange picker -->
    <link
      rel="stylesheet"
      href="/assets/plugins/daterangepicker/daterangepicker.css"
    />
    <!-- summernote -->
    <link
      rel="stylesheet"
      href="/assets/plugins/summernote/summernote-bs4.min.css"
    />
    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <!-- Preloader -->
      <div
        class="preloader flex-column justify-content-center align-items-center"
      >
        <img
          class="animation__shake"
          src="/img/logo.png"
          alt="AdminLTELogo"
          height="60"
          width="60"
        />
      </div>
    </div>

    @include('components.navbar')
    @include('components.sidebar')

    {{-- Sweetalert div --}}
    @if (session()->has('invalid'))
    <div id="invalid" data-invalid="{{ session('invalid') }}"></div>
    @endif

    @if (session()->has('success'))
    <div id="success" data-success="{{ session('success') }}"></div>
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper text-sm pt-5" style="background-color: #fff">
      
          @yield('content')
    </div>
    <!-- /.content-wrapper -->

    {{-- <footer class="main-footer text-xs">
      <strong
        >Developed by Mutawakkil Alallah &copy; 2021</strong
      >
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0
      </div>
    </footer> --}}
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

   <!-- jQuery -->
 <script src="/assets/plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
   $.widget.bridge("uibutton", $.ui.button);
 </script>
 <!-- Bootstrap 4 -->
 <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 <!-- Select2 -->
<script src="/assets/plugins/select2/js/select2.full.min.js"></script>
 <!-- ChartJS -->
 <script src="/assets/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="/assets/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="/assets/plugins/moment/moment.min.js"></script>
 <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="/assets/dist/js/adminlte.js"></script>
 {{-- Sweet Alert --}}
 <script src="/assets/dist/js/sweetalert2.all.min.js"></script>
{{-- <script>
  //Date picker
  $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script> --}}
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

  // script sweetalert2
  $(document).ready(function() {
    // invalid alert
    const invalid = $('#invalid').data('invalid');

      if (invalid) {
        Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: "Pesan : " + invalid,
        confirmButtonColor: '#d9534f',
        })
      }

      // success alert
      const success = $('#success').data('success');
      
      if (success) {
        Swal.fire({
        icon: 'success',
        title: 'Selamat !!',
        text: "Pesan : " + success,
        confirmButtonColor: '#5cb85c',
        })
      }
  })

  // ajax validasi inputan
  $(document).ready(function() {
      const error = $('#error').data('error');
      
      if (error) {
        Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: "Pesan : " + error,
        confirmButtonColor: '#d9534f',
        })
      }
  })

</script>
</body>
</html>
