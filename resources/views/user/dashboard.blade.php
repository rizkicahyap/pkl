@extends('layout.main')

@section('title', 'WPS - Dashboard')

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
    <li class="nav-item active">
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
    <li class="nav-item">
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
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Overview</h1>
</div>

<!-- Content Row -->
<div class="row">
    
    <!-- Colomn -->
    <div class="col-xl-6 mb-4">

        <!-- Row -->
        <div class="row">
            <!-- Semua Surat Card -->
            <div class="col-lg-6 col-md-6 mb-2">
                <div class="card border-bottom-primary shadow h-20 py-2 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Data Surat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('data_surat1')
                                ->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-mail-bulk fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mb-2">
                <div class="card border-bottom-success shadow h-20 py-2 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Format Surat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('format_surat1')
                                ->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-edit fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tulisan -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapseCard">
                <h6 class="m-0 font-weight-bold text-primary">WPS - User</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCard">
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="{{ asset('img/user.jpg') }}" alt="">
                    </div>
                    <p>WPS atau Website Pengelolaan Surat merupakan website yang digunakan untuk mengelola surat-menyurat di BPR BKK Kota Semarang baik itu pengarsipan surat dan pembuatan surat.   </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Colomn -->
    <div class="col-xl-6 mb-4">

        <!-- Row -->
        <div class="row">

            <!-- Kategori Surat Card -->
            @foreach($kategori as $kategori)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                {{ $kategori->nama_ktgr }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kategori->jml_count }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    

    
    </div>

</div>
<!-- /.container-fluid -->
@endsection