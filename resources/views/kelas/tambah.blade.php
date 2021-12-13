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
    <form action="/master-data/kelas/save" method="POST">
      @csrf
      @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div id="error" data-error="{{ $error }}"></div>
        @endforeach
      @endif
      <div class="row mb-3">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form-control-sm" value="{{ old('nama')  }}" id="nama" name="nama" autocomplete="off" placeholder="Masukkan nama ..">
        </div>
      </div>
      <div class="row mb-3">
        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Level Akses</label>
        <div class="col-sm-10">
          <select class="form-control form-control-sm" name="jenis_kelamin" style="width: 100%;">
            <option selected value="{{ old('jenis_kelamin') }}">{{ (old('jenis_kelamin') ? (old('jenis_kelamin') == "L" ? "Putra" : "Putri") : "-- Pilih Kategori --") }}</option>
              <option value="L">Putra</option>
              <option value="P">Putri</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
  </section>

@endsection