@extends('layouts.app')

@section('title', 'Table Matrix')

@section('main')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ route('home') }}">Home</a>
                        </li>
                    </ol>
                    <h4 class="font-weight-bolder text-white mb-0">Table Matrix</h4>
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
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                        </div>
                        <div class="card-body px-0 pt-0 pb-3">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Nama Peserta</th>
                                            @foreach ($kriteria as $k)
                                                <th
                                                    class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                    C{{ $loop->iteration }}</th>
                                            @endforeach
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Vektor S</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Vektor V</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($alternatif as $a)
                                            <tr>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-2 mt-2">
                                                        {{ $loop->iteration }}.
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $a->name }}</p>
                                                </td>
                                                @foreach ($kriteria as $k)
                                                    @php
                                                        $skor = $a->skor_alternatif->firstWhere('id_kriteria', $k->id);
                                                    @endphp
                                                    <td class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $skor ? $skor->sub_kriteria->rate : '-' }}
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ number_format($vektor_s[$a->id] ?? 0, 3) }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ number_format($vektor_v[$a->id] ?? 0, 3) }}
                                                    </p>
                                                </td>
                                                <td class="text-center">
                                                    @if ($a->status === 'Lulus')
                                                        <span class="badge bg-success">{{ $a->status }}</span>
                                                    @else
                                                        <span class="badge bg-danger">{{ $a->status }}</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="{{ $jumlah_kriteria + 4 }}"
                                                    class="text-center text-muted pb-3 pt-3">Belum ada data
                                                    matrix.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
