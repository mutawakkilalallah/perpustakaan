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
    <form action="/siswa/save" method="POST">
      @csrf
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" placeholder="Masukkan nama ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <select class="custom-select"id="jenis_kelamin" name="jenis_kelamin">
            <option selected>-- Pilih Jenis Kelamin --</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="status" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">
          <select class="custom-select"id="status" name="status">
            <option selected>-- Pilih Status --</option>
            <option value="siswa">Siswa/i</option>
            <option value="pengurus">Musyrif/Musyrifah</option>
            <option value="alumni">Alumni & Simpatisan</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Tempat Lahir</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" placeholder="Masukkan tempat lahir ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="reservationdate" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
          <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_lahir" placeholder="Pilih tanggal lahir .."/>
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" placeholder="Masukkan alamat ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="kamar" class="col-sm-2 col-form-label">Kamar</label>
        <div class="col-sm-10">
          <select class="custom-select"id="kamar" name="kamar">
            <option selected>-- Pilih Kamar --</option>
            @foreach ($kamar as $kmr)        
            <option value="{{ $kmr->id }}">{{ $kmr->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
          <select class="custom-select"id="kelas" name="kelas">
            <option selected>-- Pilih kelas --</option>
            @foreach ($kelas as $kls)        
            <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
  </section>
    
@endsection