@extends('layouts.main')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-bold">{{ $title }}</h1>
      </div>
    </div>
  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <form action="/user/save" method="POST">
      @csrf
      @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div id="error" data-error="{{ $error }}"></div>
        @endforeach
      @endif
      <div class="row mb-3">
        <label for="username" class="col-sm-2 col-form-label">Person</label>
        <div class="col-sm-10">
          <select class="form-control select2bs4" name="uuid_user" style="width: 100%;">
            <option selected value="{{ old('uuid_user')  }}">{{ ($anggotaSelected ? $anggotaSelected->nama : "Pilih santri .." ) }}</option>
            @foreach ($anggota as $data)
              <option value="{{ $data->uuid }}">{{ $data->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="text" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="username" class="form-control form-control-sm" value="{{ old('username')  }}" id="username" name="username" autocomplete="off" placeholder="Masukkan username ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control form-control-sm" id="password" name="password" autocomplete="off" placeholder="Masukkan password ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Pasword</label>
        <div class="col-sm-10">
          <input type="password" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" autocomplete="off" placeholder="Masukkan konfirmasi pasword ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="username" class="col-sm-2 col-form-label">Level Akses</label>
        <div class="col-sm-10">
          <select class="form-control form-control-sm" name="akses" style="width: 100%;">
            <option selected value="{{ old('akses')  }}">{{ (old('akses')  ? old('akses')  : "-- Pilih Level Akses --") }}</option>
              <option value="sysadmin">sysadmin</option>
              <option value="admin">admin</option>
              <option value="supervisor">supervisor</option>
              <option value="perpus-putra">perpus-putra</option>
              <option value="perpus-putri">perpus-putri</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
  </section>

@endsection