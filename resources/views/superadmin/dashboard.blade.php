@extends('layout.main')

@section('title', 'WPS - Dashboard')

@section('sidebar')
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/superadmin') }}">
        <div class="sidebar-brand-icon">    
            <img class="img-profile" src="{{ asset('img/logo.png') }}" height="60px">
        </div>
        <div class="sidebar-brand-text mx-3">WPS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/superadmin') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengguna
    </div>

    <!-- Nav Item - Data Pengguna -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/superadmin/datapengguna') }}">
            <i class="fas fa-user-alt"></i>
            <span>Data Pengguna</span></a>
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
        <div class="col-md-6 col-xl-6 mb-4">

            <!-- Row -->
            <div class="row">
                <!-- Pengguna Card -->
                <div class="col-md-12 col-xl-12 mb-4">
                    <div class="card border-bottom-primary shadow h-20 py-2 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pengguna</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('users')
                                    ->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
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
                    <h6 class="m-0 font-weight-bold text-primary">WPS - Super Admin</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCard">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                src="{{ asset('img/admin.jpg') }}" alt="">
                        </div>
                        <p>WPS atau Website Pengelolaan Surat merupakan website yang digunakan untuk mengelola surat-menyurat di BPR BKK Kota Semarang baik itu pengarsipan surat dan pembuatan surat.   </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Colomn -->
        <div class="col-md-6 col-xl-6 mb-4">

            <!-- Row -->
            <div class="row">

                <!-- User Card -->
                <div class="col-xl-6 col-sm-12 mb-2">
                    <div class="card border-bottom-info shadow h-20 py-2 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        User</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('users')
                                    ->where('level', '=', 'user')
                                    ->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Card -->
                <div class="col-xl-6 col-sm-12 mb-2">
                    <div class="card border-bottom-secondary shadow h-20 py-2 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                        Admin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('users')
                                    ->where('level', '=', 'admin')
                                    ->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Direksi Card -->
                <div class="col-xl-6 col-sm-12 mb-2">
                    <div class="card border-bottom-success shadow h-20 py-2 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Direksi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('users')
                                    ->where('level', '=', 'direksi')
                                    ->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Super Admin Card -->
                <div class="col-xl-6 col-sm-12 mb-2">
                    <div class="card border-bottom-secondary shadow h-20 py-2 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                        Super Admin</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('users')
                                    ->where('level', '=', 'superadmin')
                                    ->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

        

        

        
    </div>

</div>
<!-- /.container-fluid -->
@endsection