@extends('layout.main')

@section('title', 'WPS - Arsip Surat')

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
    <li class="nav-item active">
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
    <div class="mb-4">
        <h1 class="h3 text-gray-800">Arsip Surat</h1>
    </div>

    <!-- Tambah Table Surat -->
    <div class="container">
        @if (session('status'))
            <!-- <div class="alert alert-success">
                {{ session('status') }}
            </div> -->
            <div id="flash" data-flash=" {{ session('status') }} " ></div>
        @endif
        
        @if (session('status1'))
            <!-- <div class="alert alert-danger">
                {{ session('status1') }}
            </div> -->
            <div id="flash1" data-flash1=" {{ session('status1') }} " ></div>
        @endif

        <!-- <div class="row justify-content-between">
            <div class="col-3">
                <a href="/direksi/datasurat/buatsurat" class="btn btn-primary my-4"><i class="fas fa-plus text-gray-100"></i>   Tambah</a>

            </div>

            <div></div>

        </div> -->
    </div>

    <!-- Table Surat -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="ssfp">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="width: 5%">#</th>
                                    <th scope="col" style="width: 15%">No Surat</th>
                                    <th scope="col" style="width: 25%">Perihal</th>
                                    <th scope="col" style="width: 13%">Kategori</th>
                                    <th scope="col" style="width: 10%">Tanggal Surat</th>
                                    <th scope="col" style="width: 10%">Tgl Terima / Tgl Kirim</th>
                                    <th scope="col" style="width: 10%">Pembuat</th>
                                    <th scope="col" style="width: 13%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @foreach($surat_masuk as $sm)
                                    <tr>
                                        <th scope="row">{{ $nomor }}</th>
                                        <td>{{ $sm->no_surat }}</td>
                                        <td>{{ $sm->perihal }}</td>
                                        <td>{{ $sm->kategori->nama_ktgr }}</td>
                                        <td>{{ $sm->tgl_surat }}</td>
                                        <td>{{ $sm->tgl_diterima }}</td>
                                        <td>{{ $sm->pengguna->name }}</td>
                                        <td>
                                            <a href="/direksi/datasurat/{{ $sm->filename }}" target="_blank" class="badge badge-info">
                                                <i class="fas fa-folder-open"></i>
                                            </a>
                                            @if($sm->akses == 'BELUM' && $sm->req_akses == 'UBAH' || $sm->akses == 'BELUM' && $sm->req_akses == 'HAPUS')
                                                <span class="badge badge-danger d-inline">Akses diminta</span>
                                            @else
                                            
                                            @endif
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

</div>


<!-- /.container-fluid -->
@endsection
