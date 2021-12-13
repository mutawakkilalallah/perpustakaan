@extends('layouts.main')

@section('content')
<style>
  @media (max-width: 768px) {
      .content-detail {
      flex-direction: column-reverse;
    }
  }
</style>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-3">
      <div class="col-sm-6">
        <h1 class="m-0 text-bold">Data Siswa/i</h1>
      </div>
    </div>
    @if (session()->has('success'))
    <div id="success" data-success="{{ session('success') }}"></div>
    @endif
    @if (session()->has('invalid'))
    <div id="invalid" data-invalid="{{ session('invalid') }}"></div>
    @endif
    <form action="/siswa" method="get">
      <div class="form-row">
        <div class="form-group col-md-3">
          <select id="inputState" class="form-control form-control-sm" name="id_kamar">
              <option selected value="{{ request('id_kamar') }}">{{ ($kamarSelected ? $kamarSelected->nama : "-- Pilih Kamar --") }}</option>
            @foreach ($kamar as $kmr)
                <option value="{{ $kmr->id }}">{{ $kmr->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
          <select id="inputState" class="form-control form-control-sm" name="id_kelas">
            <option selected value="{{ request('id_kelas') }}">{{ ($kelasSelected ? $kelasSelected->nama : "-- Pilih Kelas --") }}</option>
            @foreach ($kelas as $kls)
                <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
            @endforeach
          </select>
        </div>
        @if (auth()->user()->akses == "sysadmin")    
        <div class="form-group col-md-3">
          <select id="inputState" class="form-control form-control-sm" name="jenis_kelamin">
            <option selected value="{{ request('jenis_kelamin') }}">{{ (request('jenis_kelamin') ? (request('jenis_kelamin') === "L" ? "Laki-Laki" : "Perempuan") : "-- Pilih Jenis Kelamin --") }}</option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
          </select>
        </div>
        @elseif (auth()->user()->akses == "admin")    
        <div class="form-group col-md-3">
          <select id="inputState" class="form-control form-control-sm" name="jenis_kelamin">
            <option selected value="{{ request('jenis_kelamin') }}">{{ (request('jenis_kelamin') ? (request('jenis_kelamin') === "L" ? "Laki-Laki" : "Perempuan") : "-- Pilih Jenis Kelamin --") }}</option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
          </select>
        </div>
        @elseif (auth()->user()->akses == "supervisor")    
        <div class="form-group col-md-3">
          <select id="inputState" class="form-control form-control-sm" name="jenis_kelamin">
            <option selected value="{{ request('jenis_kelamin') }}">{{ (request('jenis_kelamin') ? (request('jenis_kelamin') === "L" ? "Laki-Laki" : "Perempuan") : "-- Pilih Jenis Kelamin --") }}</option>
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
          </select>
        </div>
        @endif
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <input type="text" class="form-control form-control-sm" name="search" value="{{ request('search') }}" autocomplete="off" placeholder="Cari santri ..">
        </div>
        <div class="form-group col-md-3">
          <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
          <a href="/siswa" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
        </div>
      </div>
    </form>
  </div>
</div>

<section class="content">
  <div class="container">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">NIUP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Kamar</th>
            <th scope="col">Kelas</th>
            <th scope="col">Tgl Input Data</th>
            <th scope="col">Tgl Update Data</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $i => $d)
          <tr id="detail" data-toggle="modal" data-target="#modal-lg"
          data-uuid="{{ $d->uuid }}"
          data-niup="{{ $d->niup }}"
          data-photo="{{ $d->photo }}"
          data-nama="{{ $d->nama }}"
          data-jenis_kelamin="{{ ($d->jenis_kelamin === "L" ? "Laki-Laki" : "Perempuan") }}"
          data-tempat_lahir="{{ $d->tempat_lahir }}"
          data-tanggal_lahir="{{ showDateTime($d->tanggal_lahir, "d F Y") }}"
          data-alamat="{{ $d->alamat }}"
          data-kelas="{{ $d->kelas->nama }}"
          data-kamar="{{ $d->kamar->nama }}"
          >
            <th scope="row">{{ $data->firstItem() + $i }}</th>
            <td>{{ $d->niup }}</td>
              <td>{{ $d->nama }}</td>
              <td>{{ ($d->jenis_kelamin === "L" ? "Laki-Laki" : "Perempuan") }}</td>
              <td>{{ $d->kamar->nama }}</td>
              <td>{{ $d->kelas->nama }}</td>
              <td>{{ showDateTime($d->created_at) }}</td>
              <td>{{ showDateTime($d->updated_at) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $data->links() }}
  </div>
</section>


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Data Person</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row content-detail">
          <div class="col-md-8">
            <div class="form-group row mb-1">
              <label for="niup" class="col-sm-3 col-form-label">NIUP</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="niup">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="nama" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="nama">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="jenis_kelamin">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="tempat_lahir">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="tanggal_lahir">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="alamat">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="kelas">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="kamar" class="col-sm-3 col-form-label">Kamar</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="kamar">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <img id="photo" width="200" class="img-thumbnail mb-4">
          </div>
        </div>       
      </div>
      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a id="editPerson" class="btn btn-success">Buka Formulir</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

{{-- Javascript --}}
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#detail', function() {
      var uuid = $(this).data('uuid');
      var niup = $(this).data('niup');
      var photo = $(this).data('photo');
      var nama = $(this).data('nama');
      var jenis_kelamin = $(this).data('jenis_kelamin');
      var tempat_lahir = $(this).data('tempat_lahir');
      var tanggal_lahir = $(this).data('tanggal_lahir');
      var alamat = $(this).data('alamat');
      var kelas = $(this).data('kelas');
      var kamar = $(this).data('kamar');
      $('#editPerson').attr({href: "/siswa/detail/" + uuid});
      $('#niup').val(niup);
      $('#photo').attr({src: "/img/" + photo});
      $('#photo').attr({alt: nama});
      $('#nama').val(nama);
      $('#jenis_kelamin').val(jenis_kelamin);
      $('#tanggal_lahir').val(tanggal_lahir);
      $('#tempat_lahir').val(tempat_lahir);
      $('#alamat').val(alamat);
      $('#kelas').val(kelas);
      $('#kamar').val(kamar);
    })

    const success = $('#success').data('success');
      
      if (success) {
        Swal.fire({
        icon: 'success',
        title: 'Selamat !!',
        text: success,
        confirmButtonColor: '#5cb85c',
        })
      }

      const invalid = $('#invalid').data('invalid');

      if (invalid) {
        Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan',
        text: "Pesan : " + invalid,
        confirmButtonColor: '#d9534f',
        })
      }
  })
</script>
@endsection
