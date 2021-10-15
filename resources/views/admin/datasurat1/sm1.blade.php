@extends('layout.main')

@section('title', 'WPS - Arsip Surat')

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
    <li class="nav-item active">
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
                <a href="/admin/datasurat/buatsurat" class="btn btn-primary shadow my-4"><i class="fas fa-plus text-gray-100"></i>   Tambah</a>
                
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
                                        <th scope="row"> {{ $nomor }} </th>
                                        <td>{{ $sm->no_surat }}</td>
                                        <td>{{ $sm->perihal }}</td>
                                        <td>{{ $sm->kategori->nama_ktgr }}</td>
                                        <td>{{ $sm->tgl_surat }}</td>
                                        <td>{{ $sm->tgl_diterima }}</td>
                                        <td>{{ $sm->pengguna->name }}</td>
                                        <td>
                                        @if ($sm->sts_surat == 'PRIVAT' && $sm->user_id == $user->id)
                                            <a href="/admin/datasurat/{{ $sm->filename }}" target="_blank" class="badge badge-info">
                                                <i class="fas fa-folder-open"></i>
                                            </a>
                                            @if($sm->akses == 'BELUM' && $sm->req_akses == 'NORMAL')
                                                <form action="/admin/datasurat/aksesedit/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <form action="/admin/datasurat/aksesdelete/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif ($sm->akses == 'BELUM' && $sm->req_akses == 'UBAH')
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                                <form action="/admin/datasurat/aksesdelete/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif ($sm->akses == 'BELUM' && $sm->req_akses == 'HAPUS')
                                                <form action="/admin/datasurat/aksesedit/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                            @elseif ($sm->akses == 'SETUJU' && $sm->req_akses == 'UBAH')
                                                <a href="/admin/datasurat/{{ $sm->id }}/editsurat" class="badge badge-success">
                                                    <i class="fas fa-pen-alt"></i>
                                                </a>
                                            @elseif ($sm->akses == 'SETUJU' && $sm->req_akses == 'HAPUS')
                                                <form action="/admin/datasurat/{{ $sm->id }}" method="post" class="d-inline btn-hapus">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @elseif ($sm->sts_surat == 'PUBLIK')
                                            <a href="/admin/datasurat/{{ $sm->filename }}" target="_blank" class="badge badge-info">
                                                <i class="fas fa-folder-open"></i>
                                            </a>
                                            @if($sm->akses == 'BELUM' && $sm->req_akses == 'NORMAL')
                                                <form action="/admin/datasurat/aksesedit/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <form action="/admin/datasurat/aksesdelete/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            
                                            @elseif ($sm->akses == 'BELUM' && $sm->req_akses == 'UBAH')
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                                <form action="/admin/datasurat/aksesdelete/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif ($sm->akses == 'BELUM' && $sm->req_akses == 'HAPUS')
                                                <form action="/admin/datasurat/aksesedit/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                            @elseif ($sm->akses == 'SETUJU' && $sm->req_akses == 'UBAH')
                                                <a href="/admin/datasurat/{{ $sm->id }}/editsurat" class="badge badge-success">
                                                    <i class="fas fa-pen-alt"></i>
                                                </a>
                                            @elseif ($sm->akses == 'SETUJU' && $sm->req_akses == 'HAPUS')
                                                <form action="/admin/datasurat/{{ $sm->id }}" method="post" class="d-inline btn-hapus">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @elseif ($sm->sts_surat == 'PRIVAT')
                                            @if($sm->akses == 'BELUM' && $sm->req_akses == 'NORMAL')
                                                <form action="/admin/datasurat/aksesedit/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <form action="/admin/datasurat/aksesdelete/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            
                                            @elseif ($sm->akses == 'BELUM' && $sm->req_akses == 'UBAH')
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                                <form action="/admin/datasurat/aksesdelete/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif ($sm->akses == 'BELUM' && $sm->req_akses == 'HAPUS')
                                                <form action="/admin/datasurat/aksesedit/{{ $sm->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                            @elseif ($sm->akses == 'SETUJU' && $sm->req_akses == 'UBAH')
                                                <a href="/admin/datasurat/{{ $sm->id }}/editsurat" class="badge badge-success">
                                                    <i class="fas fa-pen-alt"></i>
                                                </a>
                                            @elseif ($sm->akses == 'SETUJU' && $sm->req_akses == 'HAPUS')
                                                <form action="/admin/datasurat/{{ $sm->id }}" method="post" class="d-inline btn-hapus">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            @endif
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