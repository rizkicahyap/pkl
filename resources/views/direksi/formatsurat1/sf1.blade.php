@extends('layout.main')

@section('title', 'WPS - Format Surat')

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
    <li class="nav-item active">
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
    <li class="nav-item">
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
<a href="{{ url('/direksi/formatsurat') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="my-3">
</div>

<!-- Form -->

<div>
    <!-- <div class="container"> -->
        <!-- Content Row -->
        <div class="row">

            <!-- Colomn -->
            <div class="col-lg-12 col-xl-9 mb-4">
        <div class="card format1">
            <div class="row justify-content-between">
                <div class="col-9 ml-2">
                    <h1 class="h3 text-gray-800 mt-3">{{ $dirFS1->judul_format }}</h1>
                    <p>{{ $dirFS1->keterangan }}</p>
                    <!-- <div class="card-body">
                        <textarea class="form-control" id="editor" name="isi_format" value="{{ $dirFS1->isi_format }}">{{ $dirFS1->isi_format }}</textarea>
                    </div> -->
                </div>
                <div class="col-2 mt-4">
                    <a href="/direksi/tampilformat/{{ $dirFS1->filename }}" target="_blank" class="btn btn-info">
                        Buka File
                    </a>
                </div>
            </div>
        </div>
    </div>
            
            <!-- Colomn -->
            <div class="col-lg-12 col-xl-3 mb-4">
                <div class="card text-dark border-warning mb-3 format2">
                    <div class="card-header">Nomor Surat</div>
                    <div class="card-body">
                        <h6 class="card-title">Nomor Surat anda untuk kategori {{ $dirFS1->kategori->nama_ktgr }} adalah</h6>
                        <p class="card-text aksen1"> {{ DB::table('data_surat1')
                            ->where('data_surat1.id_kategori', '=', $dirFS1->id_kategori)
                            ->whereYear('created_at', now()->year)
                            ->count()+1 }} </p>
                    </div>
                </div>
                
            </div>
        </div>
        
        
    <!-- </div> -->
</div>



</div>


<!-- /.container-fluid -->
@endsection