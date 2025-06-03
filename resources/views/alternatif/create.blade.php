@extends('layouts.app')

@section('title', 'Tambah Alternatif')

@section('main')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-white" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-white" href="{{ route('alternatif') }}">Alternatif</a>
                        </li>
                    </ol>
                    <h4 class="font-weight-bolder text-white mb-0">Tambah Alternatif</h4>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link text-white font-weight-bold px-0">
                                <span class="d-sm-inline d-none">SCPK Kelompok Konversi</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('save-alternatif') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="example-text-input" class="form-control-label">Nama Peserta</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                    @foreach ($kriteria as $k)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="tipe_{{ $k->id }}" class="form-control-label">{{ $k->kriteria }}</label>
                                                <select class="form-control" id="tipe_{{ $k->id }}" name="tipe[{{ $k->id }}]" required>
                                                    <option value="" disabled selected>-- Pilih Sub Kriteria --</option>
                                                    @foreach ($k->sub_kriteria as $sk)
                                                        <option value="{{ $sk->id }}">{{ $sk->desc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12 text-end mt-3">
                                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
