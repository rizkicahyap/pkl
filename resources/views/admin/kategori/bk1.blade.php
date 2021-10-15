@extends('layout.main')

@section('title', 'WPS - Kategori')

@section('sidebar')
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
        <div class="sidebar-brand-icon">    
            <img class="img-profile" src="{{ asset('img/logo.png') }}" height="60px">
        </div>
        <div class="sidebar-brand-text mx-3">WPS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Surat
    </div>

    <!-- Nav Item - Arsip Surat -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/datasurat') }}">
            <i class="fas fa-file-alt"></i>
            <span>Arsip Surat</span></a>
    </li>

    <!-- Nav Item - Format Surat -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/formatsurat') }}">
            <i class="fas fa-edit"></i>
            <span>Format Surat</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Utilitas
    </div>

    <!-- Nav Item - Kategori -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/kategori') }}">
            <i class="fas fa-bars"></i>
            <span>Kategori</span></a>
    </li>

</ul>
<!-- End of Sidebar -->
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<a href="{{ url('/admin/kategori') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="d-sm-flex align-items-center justify-content-between my-2">
    <h1 class="h3 text-gray-800">Form Tambah Kategori</h1>
</div>

<!-- Form -->

<div class="container">
    <div class="row">
        <div class="col-8">
            <form method="post" action="{{ url('/admin/kategori') }}">
                @csrf        
                <div class="form-group">
                    <label for="nama_ktgr" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_ktgr') is-invalid @enderror" id="nama_ktgr" placeholder="Masukkan Nama Kategori" name="nama_ktgr" value="{{ old('nama_ktgr') }}">
                        @error('nama_ktgr')
                            <div class="invalid-feedback">Nama Kategori harus diisi</div>
                        @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Kategori</button>

            </form>
        </div>
    </div>
</div>



</div>


<!-- /.container-fluid -->
@endsection