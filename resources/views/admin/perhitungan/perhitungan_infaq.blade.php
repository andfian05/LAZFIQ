@extends('admin.layout.index')
@section('content')
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>

                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('Admin/src/assets/images/profile/user-1.jpg') }}" alt=""
                                    width="35" height="35" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                <div class="message-body">

                                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                        <i class="ti ti-mail fs-6"></i>
                                        <p class="mb-0 fs-3">Nama Yang Login</p>
                                    </a>

                                    <a href="" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-3">Input Laporan Infaq</h5>
                        <div class="alert alert-info" role="alert">
                            Infaq Dihitung Setiap Hari Jum'at.
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <a href="{{ route('infaq.index') }}" class="btn btn-outline-primary">
                                        Mengecek Data
                                    </a>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-warning text-center" role="alert">
                                    Kalkulator Infaq
                                </div>
                                <form action="{{ route('infaq.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal</label>
                                        <input type="date" name="tanggal"
                                            class="form-control @error('tanggal') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('tanggal')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Waktu</label>
                                        <input type="time" name="waktu"
                                            class="form-control @error('waktu') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('waktu')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Pemasukan</label>
                                        <input type="number" name="debit"
                                            class="form-control @error('debit') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('debit')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Pengeluaran</label>
                                        <input type="number" name="kredit"
                                            class="form-control @error('kredit') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('kredit')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Untuk Keperluan ?</label>
                                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" cols="3"
                                            rows="3"></textarea>
                                        @error('keterangan')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bukti Pengeluaran <sup>* Jika
                                                Ada</sup></label>
                                        <input type="file" name="bukti"
                                            class="form-control @error('bukti') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('bukti')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label for="" class="form-label">Saldo Akhir</label>
                                        <input type="number" name="saldo_akhir"
                                            class="form-control @error('saldo_akhir') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('saldo_akhir')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status Infaq</label>
                                        <select name="status_infaq" id=""
                                            class="form-control @error('status_infaq') is-invalid @enderror">
                                            <option value="">--- Pilih ---</option>
                                            @foreach ($statusInfaq as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('status_infaq')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div><br>

                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
                                        Tambah Data
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="https://www.linkedin.com/in/fianfi/" 
                target="_blank"
                class="pe-1 text-primary text-decoration-underline">AndFat</a>
            </p>
        </div>
    </div>
@endsection
