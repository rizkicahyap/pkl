@extends('layout.main')

@section('title', 'WPS - Kategori')

@section('sidebar')
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/direksi') }}">
        <div class="sidebar-brand-icon">    
            <img class="img-profile" src="{{ asset('img/logo.png') }}" height="60px">
        </div>
        <div class="sidebar-brand-text mx-3">WPS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/direksi') }}">
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
        <a class="nav-link" href="{{ url('/direksi/datasurat') }}">
            <i class="fas fa-file-alt"></i>
            <span>Arsip Surat</span></a>
    </li>

    <!-- Nav Item - Format Surat -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/direksi/formatsurat') }}">
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
        <a class="nav-link" href="{{ url('/direksi/kategori') }}">
            <i class="fas fa-bars"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Akses Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="far fa-sun"></i>
            <span>Permintaan Akses</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Akses:</h6>
                <a class="collapse-item" href="{{ url('/direksi/akses/datasurat') }}">Arsip Surat</a>
                <a class="collapse-item" href="{{ url('/direksi/akses/penggunabaru') }}">Pengguna Baru</a>
                <a class="collapse-item" href="{{ url('/direksi/akses/pengguna') }}">Data Pengguna</a>
                <a class="collapse-item" href="{{ url('/direksi/akses/kategori') }}">Kategori</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h3 text-gray-800">Kategori Surat</h1>
    </div>

    <!-- Tambah Table Surat -->
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-3">                
            </div>
            <!-- Topbar Search -->
            <div class="col-3">
                <form action="{{ url('/direksi/kategori') }}" method="GET" class="d-none d-sm-inline-block form-inline navbar-search mb-4">
                    <div class="input-group">
                        <input name="cari" id="cari" type="text" class="form-control bg-white border-secondary small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <div class="nav-item dropdown no-arrow d-sm-none mb-2">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search" method="GET" action="{{ url('/direksi/kategori') }}">
                            <div class="input-group">
                                <input name="cari" type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- List Kategori -->
    <div class="container">
        <ul class="list-group">
            @foreach($kategori as $kategori)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $kategori->nama_ktgr }}
                <div class="align-items-right">
                    @if($kategori->akses == 'BELUM' && $kategori->req_akses == 'UBAH' || $kategori->akses == 'BELUM' && $kategori->req_akses == 'HAPUS')
                        <span class="badge badge-danger d-inline">Akses diminta</span>
                    @else
                    
                    @endif
                </div>
            </li>
            @endforeach
        </ul>
    </div>

</div>


<!-- /.container-fluid -->
@endsection