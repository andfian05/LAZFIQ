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
                                        <i class="ti ti-user fs-6"></i>
                                        <p class="mb-0 fs-3">
                                            {{ Auth::user()->name }}
                                        </p>
                                    </a>

                                    <a class="btn btn-outline-primary mx-3 mt-2 d-block"href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
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
                        <h5 class="card-title fw-semibold mb-3">Tambah Data Laporan</h5>
                        <a href="{{ route('postZakat.index') }}" class="btn btn-outline-primary m-1 mb-3">
                            Kembali Halaman
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('postZakat.store') }}" method="POST">
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
                                        <label for="" class="form-label">Total Zakat (Uang)</label>
                                        <input type="number" name="jzUang"
                                            class="form-control @error('jzUang') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('jzUang')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Total Zakat (Beras)</label>
                                        <input type="number" name="jzBeras"
                                            class="form-control @error('jzBeras') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('jzBeras')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Total Mustahiq Zakat</label>
                                        <input type="number" name="mustahiq"
                                            class="form-control @error('mustahiq') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('mustahiq')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status Zakat</label>
                                        <select class="form-control @error('statusZakat') is-invalid @enderror"
                                            name="statusZakat" id="">
                                            <option value="">--- Pilih ---</option>
                                            @foreach ($statusZakat as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('statusZakat')
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
            <p class="mb-0 fs-4">Design and Developed by <a href="https://www.linkedin.com/in/fianfi/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AndFath</a>
            </p>
        </div>
    </div>
    </div>
    </div>
@endsection
