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
                        <a href="{{ route('countZakat.index') }}" class="btn btn-outline-primary m-1 mb-3 ">
                            Kembali Halaman
                        </a>
                        <div class="card">
                            <div class="card-body">
                                <form id="form1" name="form1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="{{ \Carbon\Carbon::parse($countZakat->tanggal_cz)->locale('id')->isoFormat('D MMMM YYYY') }}"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Waktu</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="{{ str_replace(':', '.', \Carbon\Carbon::parse($countZakat->waktu_cz)->format('H:i')) }} WIB"
                                            disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama Muzakki Pertama</label>
                                        <input type="text" class="form-control" id="" aria-describedby=""
                                            value="{{ $countZakat->muzakki_pertama }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Keluarga Besar</label>
                                        <textarea name="" class="form-control" cols="3" rows="3" disabled>
                                            {{ $countZakat->keluarga_muzakki }}
                                        </textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Zakat Berupa ?</label>
                                        <select class="form-control" name="jenis_zakat" id="kategori"
                                            onchange="tampilkan()" disabled>
                                            @if ($countZakat->jenis_zakat === 'beras')
                                                <option value="beras" selected>Zakat beras</option>
                                            @else
                                                <option value="uang" selected>Zakat uang</option>
                                            @endif
                                        </select>
                                    </div>

                                    <script>
                                        function tampilkan() {
                                            var pesan = document.getElementById("form1").kategori.value;
                                            var p_kontainer = document.getElementById("container");

                                            if (pesan == "beras") {
                                                p_kontainer.innerHTML = `
                                                    <div class="form-group">
                                                        <label class="form-label">Dihitung Dalam Satuan Kilogram :</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" id="" aria-describedby=""
                                                                value="{{ $countZakat->zakat_beras }} Kg" disabled>
                                                        </div>
                                                    </div>
                                                `;
                                            } else if (pesan == "uang") {
                                                p_kontainer.innerHTML = `
                                                    <div class="form-group">
                                                        <label class="form-label">Dihitung Dalam Satuan Rupiah :</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-12">
                                                            <input type="text" class="form-control" id="" aria-describedby="" 
                                                                value="Rp. {{ number_format($countZakat->zakat_uang, 2, ',', '.') }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                `;
                                            }
                                        }

                                        // Otomatis jalankan
                                        document.addEventListener('DOMContentLoaded', function() {
                                            tampilkan();
                                        });
                                    </script>

                                    <div class="container">
                                        <p id="container"></p>
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Status Zakat ?</label>
                                        <select class="form-control" name="" id="" disabled>
                                            @if ($countZakat->status_cz === 'diterima')
                                                <option value="diterima" selected>Diterima oleh Amil</option>
                                            @else
                                                <option value="menunggu" selected>Menunggu disalurkan</option>
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
    </div>
@endsection
