@extends('layout.main')

@section('title', 'WPS - Arsip Surat')

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
    <li class="nav-item active">
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
    <div class="mb-2">
        <h1 class="h3 text-gray-800">Arsip Surat</h1>
    </div>

    <!-- Tambah Table Surat -->
    <div>
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

        <div class="row justify-content-between">
            <div class="col-3">
                <a href="/user/datasurat/buatsurat" class="btn btn-primary my-4"><i class="fas fa-plus text-gray-100"></i>   Tambah</a>

            </div>

            <div></div>

        </div>
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
                                    <th scope="col" style="width: 11%">Tanggal Surat</th>
                                    <th scope="col" style="width: 11%">Tgl Terima / Tgl Kirim</th>
                                    <th scope="col" style="width: 10%">Pembuat</th>
                                    <th scope="col" style="width: 11%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $user = Auth::user();
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
                                        

                                        @if($sm->sts_surat == 'PUBLIK')
                                            <td>
                                                <a href="/user/datasurat/{{ $sm->filename }}" target="_blank" class="badge badge-info">
                                                    <i class="fas fa-folder-open"></i>
                                                </a>
                                                
                                            </td> 
                                        @elseif ($sm->sts_surat == 'PRIVAT' && $sm->user_id == $user->id)
                                            <td>
                                                <a href="/user/datasurat/{{ $sm->filename }}" target="_blank" class="badge badge-info">
                                                    <i class="fas fa-folder-open"></i>
                                                </a>
                                            </td>  
                                        @else
                                            <td></td>      
                                        @endif
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