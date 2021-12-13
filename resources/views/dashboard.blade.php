@extends('layouts.main')

@section('content')

<!-- Small boxes (Stat box) -->
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      {{-- syadmin --}}
      @if (auth()->user()->akses == "sysadmin")
        @include('components.perpusWidget')
        @include('components.adminWidget')
        @include('components.sysadminWidget')
      @elseif (auth()->user()->akses == "admin")
        @include('components.perpusWidget')
        @include('components.adminWidget')
      @elseif (auth()->user()->akses == "supervisor")
        @include('components.perpusWidget')
        @include('components.adminWidget')
      @else
        @include('components.perpusWidget')
      @endif
    </div>
  </div>
</section>
    
@endsection