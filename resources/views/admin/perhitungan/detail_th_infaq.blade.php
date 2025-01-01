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
                        <h5 class="card-title fw-semibold mb-3">Melihat Data Laporan</h5>
                        <a href="{{ route('countInfaq.index') }}" class="btn btn-outline-primary m-1 mb-3 ">Kembali
                            Halaman</a>
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="{{ \Carbon\Carbon::parse($countInfaq->tanggal_ci)->locale('id')->isoFormat('D MMMM YYYY') }}"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Waktu</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="{{ str_replace(':', '.', \Carbon\Carbon::parse($countInfaq->waktu_ci)->format('H:i')) }} WIB"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Pemasukan</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="Rp. {{ number_format($countInfaq->debit_ci, 2, ',', '.') }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Pengeluaran</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="Rp. {{ number_format($countInfaq->kredit_ci, 2, ',', '.') }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Untuk Keperluan ?</label>
                                        <textarea name="keterangan" class="form-control" cols="3" rows="3" disabled>
                                            {{ $countInfaq->keterangan_ci }}
                                        </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Bukti Pengeluaran <sup>* Jika
                                                Ada</sup></label>
                                        <input type="file" class="form-control" id="" aria-describedby=""
                                            value="{{ $countInfaq->bukti_ci }}" disabled>
                                        <div class="col-md-4">
                                            <div class="card">
                                                @if (!empty($countInfaq->bukti_ci))
                                                    <img src="{{ asset('storage/' . $countInfaq->bukti_ci) }}"
                                                        class="card-img-top" alt="bukti_ci">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">
                                                            {{ \Carbon\Carbon::parse($countInfaq->tanggal_ci)->locale('id')->translatedFormat('l, d F Y') }}
                                                            :
                                                            {{ str_replace(':', '.', \Carbon\Carbon::parse($countInfaq->waktu_ci)->format('H:i')) }}
                                                            WIB
                                                        </p>
                                                    </div>
                                                @else
                                                    <img src="{{ asset('Gp/assets/img/portfolio/portfolio-1.jpg') }}"
                                                        class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text text-center">
                                                            {{ \Carbon\Carbon::parse($countInfaq->tanggal_ci)->locale('id')->translatedFormat('l, d F Y') }}
                                                            :
                                                            {{ str_replace(':', '.', \Carbon\Carbon::parse($countInfaq->waktu_ci)->format('H:i')) }}
                                                            WIB
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Saldo Akhir</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="Rp. {{ number_format($countInfaq->saldo_akhir_ci, 2, ',', '.') }}"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status Infaq</label>
                                        <select class="form-control" name="" id="" disabled>
                                            @if ($countInfaq->status_ci === 'tersimpan')
                                                <option value="tersimpan">Tersimpan Dalam Kas Masjid</option>
                                            @else
                                                <option value="disalurkan">Disalurkan Untuk Umat</option>
                                            @endif
                                        </select>
                                    </div>
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
@endsection
