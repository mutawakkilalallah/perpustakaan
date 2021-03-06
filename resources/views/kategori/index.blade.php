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
        <h1 class="m-0 text-bold">{{ $title }}</h1>
      </div>
    </div>
    <form action="/master-data/kelas/" method="get">
      <div class="form-row">
        <div class="form-group col-md-3">
          <input type="text" class="form-control form-control-sm" name="search" value="{{ request('search') }}" autocomplete="off" placeholder="Cari kategori ..">
        </div>
        <div class="form-group col-md-3">
          <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-search"></i></button>
          <a href="/master-data/kategori/" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <a href="/master-data/kategori/tambah" class="btn btn btn-success"><i class="fas fa-plus-circle"></i> Tambah Kategori</a>
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
            <th scope="col">Nama</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kategori as $i => $ktg)
          <tr id="detail" data-toggle="modal" data-target="#modal-lg"
          data-id="{{ $ktg->id }}"
          data-nama="{{ $ktg->nama }}"
          >
            <th scope="row">{{ $kategori->firstItem() + $i }}</th>
              <td>{{ $ktg->nama }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $kategori->links() }}
  </div>
</section>


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Master Data Kategori</h4>
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
          </div>
        </div>       
      </div>
      <div class="modal-footer justify-content-end">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <a id="edit" class="btn btn-success">Edit</a>
          <a id="delete" class="btn btn-danger">Delete</a>
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
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      $('#edit').attr({href: "/master-data/kategori/edit/" + id});
      $('#delete').attr({href: "/master-data/kategori/delete/" + id});
      $('#nama').val(nama);
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
@endsection
