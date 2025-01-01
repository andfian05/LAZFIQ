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
                        <h5 class="card-title fw-semibold mb-3">Input Laporan Infaq</h5>
                        <div class="alert alert-info" role="alert">
                            Qurban Dihitung Mendekati Idul Adha Atau Bulan Dzulhijjah.
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <a href="{{ route('countQurban.index') }}" class="btn btn-outline-primary">
                                        Mengecek Data
                                    </a>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="alert alert-warning text-center" role="alert">
                                    Kalkulator Qurban
                                </div>
                                <form action="{{ route('countQurban.store') }}" method="POST" enctype="multipart/form-data"
                                    id="form1" name="form1">
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
                                        <label for="" class="form-label">Kategori Hewan Qurban</label>
                                        <select class="form-control @error('kategori_qurban') is-invalid @enderror"
                                            name="kategori_qurban" id="kategori" onclick="tampilkan()">
                                            <option value="">--- Pilih ---</option>
                                            <option value="sapi">Sapi</option>
                                            <option value="kambing">Kambing</option>
                                        </select>
                                        @error('kategori_qurban')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <script>
                                        function tampilkan() {
                                            var pesan = document.getElementById("form1").kategori.value;
                                            var p_kontainer = document.getElementById("container");

                                            if (pesan == "sapi") {
                                                p_kontainer.innerHTML = `
                                                    <div class="form-group">
                                                        <label class="form-label">Orang/Keluarga Besar Yang Berqurban  :</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-12">
                                                            <textarea name="nama_yg_qurban" class="form-control @error('nama_yg_qurban') is-invalid @enderror" cols="3" rows="3"></textarea>
                                                            @error('nama_yg_qurban')
                                                                <div class="form-control-muted">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Jumlah Hewan Qurban</label>
                                                        <input type="number" name="jumlah_sapi"
                                                            class="form-control @error('jumlah_sapi') is-invalid @enderror" id=""
                                                            aria-describedby="">
                                                        @error('jumlah_sapi')
                                                            <div class="form-control-muted">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                `;
                                            } else if (pesan == "kambing") {
                                                p_kontainer.innerHTML = `
                                                    <div class="form-group">
                                                        <label class="form-label">Orang/Keluarga Besar Yang Berqurban  :</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-12">
                                                            <textarea name="nama_yg_qurban" class="form-control @error('nama_yg_qurban') is-invalid @enderror" cols="3" rows="3"></textarea>
                                                            @error('nama_yg_qurban')
                                                                <div class="form-control-muted">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Jumlah Hewan Qurban</label>
                                                        <input type="number" name="jumlah_kambing"
                                                            class="form-control @error('jumlah_kambing') is-invalid @enderror" id=""
                                                            aria-describedby="">
                                                        @error('jumlah_kambing')
                                                            <div class="form-control-muted">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                `;
                                            }
                                        }
                                    </script>

                                    <div class="container">
                                        <p id="container"></p>
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="" class="form-label">Jumlah Hewan Qurban</label>
                                        <input type="number" name="jumlah_qurban"
                                            class="form-control @error('jumlah_qurban') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('jumlah_qurban')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="mb-3">
                                        <label for="" class="form-label">Bukti Hewan Qurban <sup>* Jika
                                                Ada</sup></label>
                                        <input type="file" name="bukti"
                                            class="form-control @error('bukti') is-invalid @enderror" id=""
                                            aria-describedby="">
                                        @error('bukti')
                                            <div class="form-control-muted">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="" class="form-label">Status Qurban</label>
                                        <select class="form-control @error('statusQurban') is-invalid @enderror"
                                            name="statusQurban" id="">
                                            <option value="">--- Pilih ---</option>
                                            @foreach ($statusQurban as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('statusQurban')
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
