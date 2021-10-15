@extends('layout.main')

@section('title', 'WPS - Form Ubah Arsip Surat')

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
<a href="{{ url('/admin/datasurat') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="d-sm-flex align-items-center justify-content-between my-2">
    <h1 class="h3 text-gray-800">Form Ubah Arsip Surat</h1>
</div>

<!-- Form -->

<div class="container">
    <div class="row">
        <div class="col-8">
            <form method="post" action="/admin/datasurat/{{ $adminSM1->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="no_surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" id="no_surat" placeholder="Masukkan Nomor Surat" name="no_surat" value="{{ $adminSM1->no_surat }}">
                        @error('no_surat')
                            <div class="invalid-feedback">Nomor Surat harus diisi</div>
                        @enderror
                </div>
                                
                <div class="form-group">
                    <label for="perihal" class="form-label">Perihal</label>
                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" placeholder="Masukkan Perihal" name="perihal" value="{{ $adminSM1->perihal }}">
                        @error('perihal')
                            <div class="invalid-feedback">Perihal harus diisi</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="id_kategori" class="form-label">Kategori</label>
                    <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                        <option value="{{ $adminSM1->id_kategori }}" selected hidden>{{ $adminSM1->kategori->nama_ktgr }}</option>
                        @foreach($kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_ktgr }}</option>
                        @endforeach 
                    </select>
                        @error('id_kategori')
                            <div class="invalid-feedback">Jenis Format harus dipilih</div>
                        @enderror
                </div>
                
                <div class="form-group">
                    <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                        <input type="date" class="form-control  @error('tgl_surat') is-invalid @enderror" id="tgl_surat" placeholder="Masukkan Tanggal Surat" name="tgl_surat" value="{{ $adminSM1->tgl_surat }}">
                        <!-- @error('tgl_surat')
                            <div class="invalid-feedback">Tanggal Surat harus diisi</div>
                        @enderror -->
                        @error('tgl_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>            
                
                <div class="form-group">
                    <label for="tgl_diterima" class="form-label">Tanggal Diterima / Tanggal Dikirim</label>
                        <input type="date" class="form-control @error('tgl_diterima') is-invalid @enderror" id="tgl_surat" placeholder="Masukkan Diterima" name="tgl_diterima" value="{{ $adminSM1->tgl_diterima }}">
                        <!-- @error('tgl_diterima')
                            <div class="invalid-feedback">Tanggal Diterima / Tanggal Dikirim harus diisi</div>
                        @enderror -->
                        @error('tgl_diterima')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                
                <div class="form-group">
                    <label for="file" class="form-label">File (gambar atau .pdf)</label>
                        <input type="file" class="form-control-file @error('filename') is-invalid @enderror" id="filename" placeholder="Masukkan File" name="filename" value="{{ $adminSM1->filename }}" accept="image/*,application/pdf">
                        @error('filename')
                            <!-- <div class="invalid-feedback">File harus diisi</div> -->
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="" class="form-label">Status Surat</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sts_surat" id="publik" value="PUBLIK" checked>
                        <label class="form-check-label" for="publik">
                            Publik
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sts_surat" id="privat" value="PRIVAT">
                        <label class="form-check-label" for="privat">
                            Privat
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Ubah Surat</button>

            </form>
        </div>
    </div>
</div>



</div>


<!-- /.container-fluid -->
@endsection