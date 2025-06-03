@extends('layouts.app')

@section('title', 'Sub Kriteria')

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
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-white" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-5 text-white" href="{{ route('kriteria-bobot') }}">Kriteria dan Bobot</a>
                        </li>
                    </ol>
                    <h4 class="font-weight-bolder text-white mb-0">{{ $kriteria->kriteria }}</h4>
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
                            <a href="{{ route('add-sub-kriteria', $kriteria->id) }}" class="btn btn-sm btn-primary"
                                data-toggle="tooltip" title="Tambah Kriteria">
                                <i class="fas fa-plus me-1"></i> Tambah Sub Kriteria
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
                                                Deskripsi</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Bobot</th>
                                            <th
                                                class="text-center text-uppercase text-sm text-secondary font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sub_kriteria as $sk)
                                            <tr>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $loop->iteration }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-center text-sm font-weight-bold mb-0">
                                                        {{ $sk->desc }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-secondary text-sm font-weight-bold">{{ $sk->rate }}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <a href="#" class="btn btn-sm btn-warning text-white mt-2 mb-2"
                                                        data-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit me-1"></i> Edit
                                                    </a>
                                                    <form id="delete-form-{{ $sk->id }}"
                                                        action="{{ route('delete-sub-kriteria', $sk->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            onclick="confirmDelete('delete-form-{{ $sk->id }}')"
                                                            class="btn btn-sm btn-danger mt-2 mb-2" data-toggle="tooltip"
                                                            title="Hapus">
                                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted pb-3 pt-3">Belum ada data
                                                    sub kriteria.</td>
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
        
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endpush
