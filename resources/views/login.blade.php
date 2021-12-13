<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MAKTABAH</title>

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
    <!-- icheck bootstrap -->
    <link
      rel="stylesheet"
      href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css" />
  </head>
  <body class="hold-transition login-page">
    @if ($errors->any())
      @foreach ($errors->all() as $error)
        <div id="error" data-error="{{ $error }}"></div>
      @endforeach
    @endif
    <div class="login-box">
      @if (session()->has('errorLogin'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('errorLogin') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!-- /.login-logo -->
      <div class="card card-outline card-success">
        <div class="card-header text-center">
          <h1 class="font-weight-bold">MAKTABAH</h1>
        </div>
        <div class="card-body text-center">
          <img src="/img/logo.png" alt="" srcset="">
          <p class="login-box-msg">Asrama MAPK Nurul Jadid</p>

          <form action="/login" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukkan username .." name="username" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Masukkan password .."
                name="password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col">
                <button type="submit" class="btn btn-success">Masuk</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
     {{-- Sweet Alert --}}
    <script src="/assets/dist/js/sweetalert2.all.min.js"></script>
    <script>
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
