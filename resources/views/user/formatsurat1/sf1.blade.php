@extends('layout.main')

@section('title', 'WPS - Format Surat')

@section('sidebar')
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/user') }}">
        <div class="sidebar-brand-icon">    
            <img class="img-profile" src="{{ asset('img/logo.png') }}" height="60px">
        </div>
        <div class="sidebar-brand-text mx-3">WPS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/user') }}">
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
        <a class="nav-link" href="{{ url('/user/datasurat') }}">
            <i class="fas fa-file-alt"></i>
            <span>Arsip Surat</span></a>
    </li>

    <!-- Nav Item - Format Surat -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/user/formatsurat') }}">
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
        <a class="nav-link" href="{{ url('/user/kategori') }}">
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
<a href="{{ url('/user/formatsurat') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="my-3">
</div>

<!-- Form -->

<div>
    <!-- Content Row -->
    <div class="row">

    <!-- Colomn -->
    <div class="col-lg-12 col-xl-9 mb-4">
        <div class="card format1">
            <div class="row justify-content-between">
                <div class="col-9 ml-2">
                    <h1 class="h3 text-gray-800 mt-3">{{ $userFS1->judul_format }}</h1>
                    <p>{{ $userFS1->keterangan }}</p>
                    <!-- <div class="card-body">
                        <textarea class="form-control" id="editor" name="isi_format" value="{{ $userFS1->isi_format }}">{{ $userFS1->isi_format }}</textarea>
                    </div> -->
                </div>
                <div class="col-2 mt-4">
                    <a href="/user/tampilformat/{{ $userFS1->filename }}" target="_blank" class="btn btn-info">
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
                <h6 class="card-title">Nomor Surat anda untuk kategori {{ $userFS1->kategori->nama_ktgr }} adalah</h6>
                <p class="card-text aksen1"> {{ DB::table('data_surat1')
                    ->where('data_surat1.id_kategori', '=', $userFS1->id_kategori)
                    ->whereYear('created_at', now()->year)
                    ->count()+1 }} </p>
            </div>
        </div>
        
    </div>
    </div>
    
</div>



</div>


<!-- /.container-fluid -->
@endsection

