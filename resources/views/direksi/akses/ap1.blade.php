@extends('layout.main')

@section('title', 'WPS - Akses Data Pengguna')

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
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/direksi/kategori') }}">
            <i class="fas fa-bars"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Nav Item - Akses Collapse Menu -->
    <li class="nav-item active">
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
                <a class="collapse-item active" href="{{ url('/direksi/akses/pengguna') }}">Data Pengguna</a>
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Akses Data Pengguna</h1>
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
                                    <th scope="col" style="width: 33%">Nama</th>
                                    <th scope="col" style="width: 10%">Username</th>
                                    <th scope="col" style="width: 20%">Email</th>
                                    <th scope="col" style="width: 8%">Level</th>
                                    <th scope="col" style="width: 12%">Keterangan</th>
                                    <th scope="col" style="width: 12%">Beri Akses?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @foreach($pengguna as $pengguna)
                                    @if($pengguna->akses == 'BELUM' && $pengguna->req_akses == 'UBAH' || $pengguna->akses == 'BELUM' && $pengguna->req_akses == 'HAPUS')
                                        <tr>
                                            <th scope="row"> {{ $nomor }} </th>
                                            <td>{{ $pengguna->name }}</td>
                                            <td>{{ $pengguna->username }}</td>
                                            <td>{{ $pengguna->email }}</td>
                                            <td>{{ $pengguna->level }}</td>
                                            <td>
                                            @if($pengguna->akses == 'BELUM' && $pengguna->req_akses == 'UBAH')
                                                Pengubahan Akun
                                            @elseif($pengguna->akses == 'BELUM' && $pengguna->req_akses == 'HAPUS')
                                                Penghapusan Akun
                                            @endif
                                            </td>
                                            <td>
                                            <form action="/direksi/akses/pengguna/{{ $pengguna->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses2">
                                                        Beri
                                                    </button>
                                                </form>
                                                <form action="/direksi/akses/pengguna/{{ $pengguna->id }}" method="post" class="d-inline">
                                                    @method('patch')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger">
                                                        Tolak
                                                    </button>
                                                </form>
                                                
                                            </td>  
                                        </tr>
                                        @php
                                            $nomor += 1;
                                        @endphp      
                                    @endif
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
