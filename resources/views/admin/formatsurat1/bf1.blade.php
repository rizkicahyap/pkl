@extends('layout.main')

@section('title', 'WPS - Form Tambah Format Surat')

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
<a href="{{ url('/admin/formatsurat') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
<div class="d-sm-flex align-items-center justify-content-between my-2">
    <h1 class="h3 text-gray-800">Form Tambah Format Surat</h1>
</div>

<!-- Form -->

<div class="container">
    <div class="row">
        <div class="col-8">
            <form method="post" action="{{ url('/admin/formatsurat') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_kategori" class="form-label">Jenis Surat</label>
                    <select class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori">
                        <option value="" disabled selected hidden>Pilih Jenis Surat...</option>
                        @foreach($kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_ktgr }}</option>
                        @endforeach 
                    </select>
                        @error('id_kategori')
                            <div class="invalid-feedback">Jenis Format harus dipilih</div>
                        @enderror
                </div>
                                
                <div class="form-group">
                    <label for="judul_format" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('judul_format') is-invalid @enderror" id="judul_format" placeholder="Masukkan Judul" name="judul_format" value="{{ old('judul_format') }}">
                        @error('judul_format')
                            <div class="invalid-feedback">Judul Format harus diisi</div>
                        @enderror
                </div>            
                
                <div class="form-group">
                    <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan Keterangan" name="keterangan" value="{{ old('keterangan') }}">
                </div>         
                
                <!-- <div class="form-group">
                    <label for="isi_format" class="form-label">Isi</label>
                    <div class="card edit-format">
                        <textarea class="form-control @error('isi_format') is-invalid @enderror" id="editor" placeholder="Masukkan Isi" name="isi_format" value="{{ old('isi_format') }}"></textarea>
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="file" class="form-label">File (.doc atau .docx)</label>
                        <input type="file" class="form-control-file @error('filename') is-invalid @enderror" id="filename" placeholder="Masukkan File" name="filename" value="{{ old('filename') }}" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        @error('filename')
                            <!-- <div class="invalid-feedback">File harus diisi</div> -->
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                </div>
                
                <button type="submit" class="btn btn-primary mb-4">Tambah Format</button>

            </form>
        </div>
    </div>
</div>



</div>


<!-- /.container-fluid -->
@endsection
