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
    <form action="/user" method="get">
      <div class="form-row">
        <div class="form-group col-md-3">
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
      <div class="form-row">
        <div class="form-group col-md-3">
          <input type="text" class="form-control form-control-sm" name="search" value="{{ request('search') }}" autocomplete="off" placeholder="Cari santri ..">
        </div>
        <div class="form-group col-md-3">
          <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
          <a href="/user" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <a href="/user/tambah" class="btn btn btn-success"><i class="fas fa-user-plus"></i> Tambah User</a>
        </div>
      </div>
    </form>
  </div>
</div>

<section class="content" id="auth" data-akses="{{ auth()->user()->akses }}">
  <div class="container">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Hak Akses</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $i => $d)
          <tr id="detail" data-toggle="modal" data-target="#modal-lg"
          data-uuid="{{ $d->uuid }}"
          data-photo="{{ $d->anggota->photo }}"
          data-nama="{{ $d->anggota->nama }}"
          data-username="{{ $d->username }}"
          data-akses="{{ $d->akses }}">
            <th scope="row">{{ $data->firstItem() + $i }}</th>
              <td><img src="/img/{{ $d->anggota->photo }}" width="40px" class="rounded-circle" alt="{{ $d->anggota->nama }}"></td>
              <td>{{ $d->anggota->nama }}</td>
              <td>&#64;{{ $d->username }}</td>
              <td>{{ $d->akses }}</td>
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
        <h4 class="modal-title">Detail Data User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row content-detail">
          <div class="col-md-8">
            <div class="form-group row mb-1">
              <label for="nama" class="col-sm-3 col-form-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="nama">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="username" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="username">
              </div>
            </div>
            <div class="form-group row mb-1">
              <label for="akses" class="col-sm-3 col-form-label">Hak Akses</label>
              <div class="col-sm-6">
                <input type="text" readonly class="form-control-plaintext" id="akses">
              </div>
            </div>
          </div>
          <div class="col-md-4 justify-content-end">
            <img id="photo" width="150" class="img-thumbnail mb-4">
          </div>
        </div>       
      </div>
      <div class="modal-footer justify-content-end">
        <form id="deleteUser" method="POST">
          @method('delete')
          @csrf
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a id="editUser" class="btn btn-success">Edit User</a>
          <a id="delete" class="btn btn-danger">Delete User</a>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  // ajax modal
  $(document).ready(function() {
    $(document).on('click', '#detail', function() {
      var uuid = $(this).data('uuid');
      var photo = $(this).data('photo');
      var nama = $(this).data('nama');
      var username = $(this).data('username');
      var akses = $(this).data('akses');
      $('#editUser').attr({href: "/user/edit/" + uuid});
      $('#delete').attr({href: "/user/delete/" + uuid});
      $('#photo').attr({src: "/img/" + photo});
      $('#photo').attr({alt: nama});
      $('#nama').val(nama);
      $('#username').val("@" + username);
      $('#akses').val(akses);
    })
  })

  // ajax tombol delete
  $('#delete').on('click', function (e) {
    
    e.preventDefault();
    var href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah anda yakin !!',
      text: "Akan menghapus data ?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#5cb85c',
      cancelButtonColor: '#d9534f',
      confirmButtonText: 'Hapus',
      cancelButtonText: 'Tidak',
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href
      }
    })

  })
</script>

{{-- <script>
  $('#editUser').on('click', function (e) {
    
    e.preventDefault();
    var href = $(this).attr('href');
    var akses = $('#auth').data('akses');

    if (akses == "sysadminx") {
      document.location.href = href
    } else if (akses == "adminx") {
      document.location.href = href
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Terjadi kesalahan',
        text: "Pesan : anda tidak mempunyai hak akses",
        confirmButtonColor: '#d9534f',
        })
    }

  })
</script> --}}
@endsection
