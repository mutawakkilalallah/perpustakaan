@extends('layouts.main')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center p-3">
      <div class="col-auto text-center">
        <img src="/img/{{ $user->photo }}" width="200px" class="rounded-circle mb-3" alt="{{ $user->nama }}">
        <h3>{{ $user->nama }}</h3>
        <b class="text-success">&#64;{{ auth()->user()->username }}</b>
        <p class="text-muted">( {{ auth()->user()->akses }} )</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-12">
        <div class="card card-success card-outline card-tabs">
          <div class="card-header p-0 pt-1 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-biodata-tab" data-toggle="pill" href="#custom-tabs-three-biodata" role="tab" aria-controls="custom-tabs-three-biodata" aria-selected="true">Biodata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-password-tab" data-toggle="pill" href="#custom-tabs-three-password" role="tab" aria-controls="custom-tabs-three-password" aria-selected="false">Password</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-three-biodata" role="tabpanel" aria-labelledby="custom-tabs-three-biodata-tab">
                <div class="row content-detail">
                  <div class="col-md-8">
                    <div class="form-group row mb-1">
                      <label for="niup" class="col-sm-3 col-form-label">NIUP</label>
                      <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="niup" value="{{ $user->niup }}">
                      </div>
                    </div>
                    <div class="form-group row mb-1">
                      <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                      <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="nama"  value="{{ $user->nama }}">
                      </div>
                    </div>
                    <div class="form-group row mb-1">
                      <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin"  value="{{ ($user->jenis_kelamin === "L" ? "Laki-Laki" : "Perempuan") }}">
                      </div>
                    </div>
                    <div class="form-group row mb-1">
                      <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="tempat_lahir"  value="{{ $user->tempat_lahir }}">
                      </div>
                    </div>
                    <div class="form-group row mb-1">
                      <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="tanggal_lahir"  value="{{ showDateTime($user->tanggal_lahir, "d F Y") }}">
                      </div>
                    </div>
                    <div class="form-group row mb-1">
                      <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-6">
                        <input type="text" readonly class="form-control-plaintext" id="alamat"  value="{{ $user->alamat }}">
                      </div>
                    </div>
                  </div>
                </div> 
              </div>
              <div class="tab-pane fade" id="custom-tabs-three-password" role="tabpanel" aria-labelledby="custom-tabs-three-password-tab">
                <form action="/user/updatePassword/{{ auth()->user()->uuid }}" method="POST">
                  @method('put')
                  @csrf
                  @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div id="error" data-error="{{ $error }}"></div>
                    @endforeach
                  @endif
                  <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control form-control-sm" id="password" name="password" autocomplete="off" placeholder="Masukkan password .." value="{{ old('password') }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Pasword</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" autocomplete="off" placeholder="Masukkan konfirmasi pasword .." value="{{ old('password_confirmation') }}">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success">Ubah Password</button>
                </form>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
  </section>

@endsection