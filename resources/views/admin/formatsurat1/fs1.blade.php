@extends('layout.main')

@section('title', 'WPS - Format Surat')

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
    <li class="nav-item active">
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
    <li class="nav-item">
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Format Surat</h1>
    </div>

    <!-- Tambah Table Surat -->
    @if (session('status'))
        <!-- <div class="alert alert-success">
            {{ session('status') }}
        </div> -->
        <div id="flash" data-flash=" {{ session('status') }} " ></div>
     @endif
     <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
    <div class="row justify-content-between">
        <div class="col-3">
            <a href="/admin/formatsurat/buatformat" class="btn btn-primary my-4"><i class="fas fa-plus text-gray-100"></i>   Tambah</a>
            
        </div>

        <div></div>

    </div>

    <!-- Content Row -->
    <!-- <div class="row"> -->
        <!-- Format -->

        <!-- Table Format -->
        <div class="card shadow mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="ssfp">
                                <thead class="thead-light">
                                    <tr>
                                    <th scope="col" style="width: 5%">#</th>
                                        <th scope="col" style="width: 70%">Judul Format</th>
                                        <th scope="col" style="width: 15%">Kategori</th>
                                        <th scope="col" style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $nomor = 1;
                                    @endphp
                                    @foreach($format_surat as $fs)
                                        <tr>
                                            <th scope="row"> {{ $nomor }} </th>
                                            <td>{{ $fs->judul_format }}</td>
                                            <td>{{ $fs->kategori->nama_ktgr }}</td>
                                            <td>
                                            <a href="/admin/formatsurat/{{ $fs->id }}" class="badge badge-primary">Lihat Format</a>
                                            </td>
                                        </tr>
                                        @php
                                            $nomor += 1;
                                        @endphp
                                    @endforeach
                                    
                                </tbody>
                            </table>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        <!-- @foreach($format_surat as $fs)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-dark kotak-format">
                    <div class="card-header">{{ $fs->kategori->nama_ktgr }}</div>
                    <div class="card-body text-dark">
                        <h5 class="card-title">{{ $fs->judul_format }}</h5>
                        <p class="card-text">{{ Str::limit($fs->keterangan, 55) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/formatsurat/{{ $fs->id }}" class="btn btn-primary float-right my-2 mr-2">Get Format</a>
                    </div>
                </div>
            </div>
        @endforeach         -->

        
        
    <!-- </div> -->
</div>


<!-- /.container-fluid -->
@endsection