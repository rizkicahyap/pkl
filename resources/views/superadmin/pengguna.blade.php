@extends('layout.main')

@section('title', 'WPS - Data Pengguna')

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
    <li class="nav-item">
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
    <li class="nav-item active">
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
    <div class="mb-2">
        <h1 class="h3 text-gray-800">Data Pengguna</h1>
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
                <a href="{{ url('/superadmin/datapengguna/tambahpengguna') }}" class="btn btn-primary shadow my-4"><i class="fas fa-plus text-gray-100"></i>   Tambah</a>
                
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
                                    <th scope="col" style="width: 30%">Nama</th>
                                    <th scope="col" style="width: 13%">Username</th>
                                    <th scope="col" style="width: 20%">Email</th>
                                    <th scope="col" style="width: 12%">Level</th>
                                    <th scope="col" style="width: 10%">Validasi</th>
                                    <th scope="col" style="width: 11%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                @foreach($pengguna as $pengguna)
                                    <tr>
                                        <th scope="row"> {{ $nomor }} </th>
                                        <td>{{ $pengguna->name }}</td>
                                        <td>{{ $pengguna->username }}</td>
                                        <td>{{ $pengguna->email }}</td>
                                        <td>{{ $pengguna->level }}</td>
                                        <td>
                                            @if($pengguna->validasi == 'VALID')
                                                <span class="badge badge-success d-inline">Aktif</span>
                                            @elseif($pengguna->validasi == 'INVALID')
                                                <span class="badge badge-danger d-inline">Belum Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($pengguna->akses == 'BELUM' && $pengguna->req_akses == 'NORMAL')
                                                <form action="/superadmin/datapengguna/aksesedit/{{ $pengguna->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <form action="/superadmin/datapengguna/aksesdelete/{{ $pengguna->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif ($pengguna->akses == 'BELUM' && $pengguna->req_akses == 'UBAH')
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                                <form action="/superadmin/datapengguna/aksesdelete/{{ $pengguna->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif ($pengguna->akses == 'BELUM' && $pengguna->req_akses == 'HAPUS')
                                                <form action="/superadmin/datapengguna/aksesedit/{{ $pengguna->id }}" method="post" class="d-inline">
                                                    @method('put')
                                                    @csrf
                                                    <button type="submit" class="badge badge-success" id="btn-akses">
                                                        <i class="fas fa-lock"></i>
                                                    </button>
                                                </form>
                                                <span class="badge badge-secondary d-inline"><i class="fas fa-clock"></i></span>
                                            @elseif ($pengguna->akses == 'SETUJU' && $pengguna->req_akses == 'UBAH')
                                                <a href="/superadmin/datapengguna/{{ $pengguna->id }}/editpengguna" class="badge badge-success">
                                                    <i class="fas fa-pen-alt"></i>
                                                </a>
                                            @elseif ($pengguna->akses == 'SETUJU' && $pengguna->req_akses == 'HAPUS')
                                                <form action="/superadmin/datapengguna/{{ $pengguna->id }}" method="post" class="d-inline btn-hapus">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger" id="btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
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