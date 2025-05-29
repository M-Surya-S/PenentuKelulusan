@extends('layouts.app')

@section('title', 'Kriteria dan Bobot')

@push('style')
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <Style>
        .swal2-container {
            z-index: 9999 !important;
        }
    </Style>
@endpush

@section('main')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                href="{{ route('home') }}">Home</a>
                        </li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Kriteria dan Bobot</h6>
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
                            <a href="{{ route('add-kriteria-bobot') }}" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                title="Tambah Kriteria">
                                <i class="fas fa-plus me-1"></i> Tambah Kriteria
                            </a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                No</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Kriteria</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Bobot</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Type</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kriteria_bobot as $kriteria)
                                            <tr>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        C{{ $loop->iteration }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $kriteria->kriteria }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $kriteria->bobot }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ Str::title($kriteria->tipe) }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="{{ route('edit-kriteria-bobot', $kriteria->id) }}"
                                                        class="btn btn-sm btn-warning text-white mt-2 mb-2"
                                                        data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-secondary mt-2 mb-2"
                                                        data-toggle="tooltip" title="Sub Kriteria">
                                                        <i class="fas fa-circle-info me-1"></i> Sub Kriteria
                                                    </a>
                                                    <form id="delete-form-{{ $kriteria->id }}"
                                                        action="{{ route('delete-kriteria-bobot', $kriteria->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            onclick="confirmDelete('delete-form-{{ $kriteria->id }}')"
                                                            class="btn btn-sm btn-danger mt-2 mb-2" data-toggle="tooltip"
                                                            title="Hapus">
                                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted pb-3 pt-3">Belum ada data
                                                    kriteria
                                                    dan bobot.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-1">
                            <h6>PERBAIKAN BOBOT</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Bobot/Kriteria</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Bobot Kepentingan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kriteria_bobot as $kriteria)
                                            <tr>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-2 mt-2">
                                                        W{{ $loop->iteration }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ round($kriteria->bobot / $total_bobot, 2) }}</p>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="text-center text-muted pb-3 pt-3">Belum ada data
                                                    bobot.</td>
                                            </tr>
                                        @endforelse ()
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

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(formId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
@endpush
