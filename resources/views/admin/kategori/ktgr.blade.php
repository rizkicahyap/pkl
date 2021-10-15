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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori Surat</h1>
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
        
        <div class="row justify-content-between">
            <div class="col-3">
                <a href="kategori/buatkategori" class="btn btn-primary my-4"><i class="fas fa-plus text-gray-100"></i>   Tambah</a>
                
            </div>


            <!-- Topbar Search -->
            <div class="col-3">
                <form action="{{ url('/admin/kategori') }}" method="GET" class="d-none d-sm-inline-block form-inline navbar-search mb-4">
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
                        <form class="form-inline mr-auto w-100 navbar-search" method="GET" action="{{ url('/admin/kategori') }}">
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
    <div class="container mb-4">
        <ul class="list-group">
            @foreach($kategori as $kategori)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $kategori->nama_ktgr }}
                <!-- @if($kategori->akses == 'BELUM' && $kategori->req_akses == 'NORMAL')
                    <div class="align-items-right">
                        <form action="/admin/kategori/{{ $kategori->id }}" method="post" class="d-inline">
                            @method('put')
                            @csrf
                            <button type="submit" class="badge badge-warning" id="btn-akses">
                                Akses
                            </button>
                        </form>
                    </div>
                @elseif ($kategori->akses == 'BELUM' && $kategori->req_akses == 'MINTA')
                    <div class="align-items-right">
                        <span class="badge badge-secondary d-inline">Terkirim</span>
                    </div>
                @elseif ($kategori->akses == 'SETUJU')
                    <div class="align-items-right">
                        <a href="/admin/kategori/{{ $kategori->id }}/editkategori" class="badge badge-success">
                            <i class="fas fa-pen-alt"></i>
                        </a>
                        <form action="/admin/kategori/{{ $kategori->id }}" method="post" class="d-inline btn-hapus">
                            @method('delete')
                            @csrf
                            <button type="submit" class="badge badge-danger" id="btn-hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                @endif -->
                @if($kategori->akses == 'BELUM' && $kategori->req_akses == 'NORMAL')
                <div class="align-items-right">
                    <form action="/admin/kategori/aksesedit/{{ $kategori->id }}" method="post" class="d-inline">
                        @method('put')
                        @csrf
                        <button type="submit" class="badge badge-success" id="btn-akses">
                            <i class="fas fa-lock"></i>
                        </button>
                    </form>
                    <form action="/admin/kategori/aksesdelete/{{ $kategori->id }}" method="post" class="d-inline">
                        @method('put')
                        @csrf
                        <button type="submit" class="badge badge-danger" id="btn-akses">
                            <i class="fas fa-lock"></i>
                        </button>
                    </form>
                </div>
            
                @elseif ($kategori->akses == 'BELUM' && $kategori->req_akses == 'UBAH')
                <div class="align-items-right">
                    <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                    <form action="/admin/kategori/aksesdelete/{{ $kategori->id }}" method="post" class="d-inline">
                        @method('put')
                        @csrf
                        <button type="submit" class="badge badge-danger" id="btn-akses">
                            <i class="fas fa-lock"></i>
                        </button>
                    </form>
                </div>
                @elseif ($kategori->akses == 'BELUM' && $kategori->req_akses == 'HAPUS')
                <div class="align-items-right">
                    <form action="/admin/kategori/aksesedit/{{ $kategori->id }}" method="post" class="d-inline">
                        @method('put')
                        @csrf
                        <button type="submit" class="badge badge-success" id="btn-akses">
                            <i class="fas fa-lock"></i>
                        </button>
                    </form>
                    <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                </div>
                @elseif ($kategori->akses == 'SETUJU' && $kategori->req_akses == 'UBAH')
                <div class="align-items-right">
                    <a href="/admin/kategori/{{ $kategori->id }}/editkategori" class="badge badge-success">
                        <i class="fas fa-pen-alt"></i>
                    </a>
                </div>
                @elseif ($kategori->akses == 'SETUJU' && $kategori->req_akses == 'HAPUS')
                <div class="align-items-right">
                    <form action="/admin/kategori/{{ $kategori->id }}" method="post" class="d-inline btn-hapus">
                        @method('delete')
                        @csrf
                        <button type="submit" class="badge badge-danger" id="btn-hapus">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
                @endif
            </li>
            @endforeach
        </ul>
    </div>

</div>


<!-- /.container-fluid -->
@endsection