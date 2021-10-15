@extends('layout.main')

@section('title', 'WPS - Ubah Pengguna')

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
<a href="{{ url('/superadmin/datapengguna') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="d-sm-flex align-items-center justify-content-between my-2">
    <h1 class="h3 text-gray-800">Form Ubah Pengguna</h1>
</div>

<!-- Form -->

<div class="container">
    <div class="row">
        <div class="col-8">
            <form method="post" action="/superadmin/datapengguna/{{ $pengguna->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ $pengguna->name }}">
                        @error('name')
                            <div class="invalid-feedback">Nama harus diisi</div>
                        @enderror
                </div>
                                
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username" value="{{ $pengguna->username }}">
                        @error('username')
                            <div class="invalid-feedback">Username harus diisi</div>
                        @enderror
                </div>
                
                
                <div class="form-group">
                    <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan E-mail" name="email" value="{{ $pengguna->email }}">
                        @error('email')
                            <div class="invalid-feedback">E-mail harus diisi</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password Baru (opsional)</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password" value="">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                        <option value="{{ $pengguna->level }}" selected hidden>{{ $pengguna->level }}</option>
                        <option value="admin">Admin</option>
                        <option value="superadmin">Super Admin</option>
                        <option value="direksi">Direksi</option>
                        <option value="user">User</option>
                    </select>
                        @error('level')
                            <div class="invalid-feedback">Level harus dipilih</div>
                        @enderror
                </div>  -->

                <button type="submit" class="btn btn-primary mb-4">Ubah Pengguna</button>

            </form>
        </div>
    </div>
</div>



</div>


<!-- /.container-fluid -->
@endsection