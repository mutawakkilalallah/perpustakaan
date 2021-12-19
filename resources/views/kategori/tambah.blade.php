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
    <form action="/master-data/kategori/save" method="POST">
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
        <label for="exampleFormControlFile1" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
  </section>

@endsection