@extends('pembaca.layout.index')
@section('content')
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block"
            data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="assets/img/" height="34" alt="" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span>
                </button>
                <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
                        <li class="nav-item px-3 px-xl-4">
                            <a class="nav-link fw-medium" aria-current="page" href="/">
                                Kembali
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section style="padding-top: 7rem;">
            <div class="bg-holder" style="background-image:url(assets/img/hero/hero-bg.svg); ">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end">
                        <img class="pt-6 pt-md-0 hero-img" src="{{ asset('Zakat/public/assets/img/hero/LAFIQ.png') }}"
                            alt="" />
                    </div>
                    <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
                        <h4 class="fw-bold text-danger mb-3">Informasi Infaq, Zakat, Dan Qurban</h4>
                        <h1 class="hero-title">Masjid Jami' Fajar Shiddiq</h1><br>
                        <div class="text-center text-md-start">
                            <a class="btn btn-primary btn-lg me-md-4 mb-3 mb-md-0 border-0 primary-btn-shadow"
                                href="https://maps.app.goo.gl/z6ocVLV4yZVy322x6" target="_blank" role="button">
                                Lokasi Masjid
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="pt-5 pt-md-9" id="menyalurkan">
            <div class="container">
                <div class="position-absolute z-index--1 end-0 d-none d-lg-block">
                    <img src="{{ asset('Zakat/public/assets/img/category/shape.svg') }}" style="max-width: 200px"
                        alt="service" />
                </div>
                <div class="mb-7 text-center">
                    <h5 class="text-secondary">Detail Laporan</h5>
                    <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">
                        Zakat Fitrah & Profesi
                    </h3>
                </div>
                <div class="row flex-center">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-16 d-flex align-items-stretch">
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                                            <div class="mb-3 mb-sm-0">
                                                <h5 class="card-title fw-semibold">Detail Laporan</h5>
                                            </div>
                                            <div>
                                                <form action="{{ route('lazfiq.zakat') }}" method="GET" id="yearForm">
                                                    <select class="form-select" name="year"
                                                        onchange="document.getElementById('yearForm').submit()">
                                                        <option value="">Semua</option>
                                                        @foreach ($years as $item)
                                                            <option value="{{ $item->year }}"
                                                                {{ request('year') == $item->year ? 'selected' : '' }}>
                                                                {{ $item->year }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table text-nowrap mb-0 align-middle">
                                                <thead class="text-dark fs-5">
                                                    <tr>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">
                                                                No.
                                                            </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">
                                                                Tanggal
                                                            </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">
                                                                Total Zakat (Uang)
                                                            </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">
                                                                Total Zakat (Beras)
                                                            </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">
                                                                Total Mustahiq Zakat
                                                            </h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">
                                                                Status Zakat
                                                            </h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @forelse ($zakats as $zakat)
                                                        <tr>
                                                            <td class="border-bottom-0">
                                                                <h6 class="fw-semibold mb-0">
                                                                    {{ $no++ }}
                                                                </h6>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <span class="badge bg-secondary rounded-0 fw-semibold">
                                                                        {{ \Carbon\Carbon::parse($zakat->tanggal_pz)->locale('id')->translatedFormat('l, d F Y') }}
                                                                    </span>
                                                                </div>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <p class="mb-0 fw-normal">
                                                                    Rp. {{ number_format($zakat->zakat_uang, 2, ',', '.') }}
                                                                </p>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <p class="mb-0 fw-normal">
                                                                    {{ $zakat->zakat_beras }} Kilogram
                                                                </p>
                                                            </td>
                                                            <td class="border-bottom-0">
                                                                <p class="mb-0 fw-normal">
                                                                    {{ $zakat->mustahiq_pz }} Orang
                                                                </p>
                                                            </td>
                                                            <td class="border-bottom-0 d-flex align-items-center gap-2">
                                                                @if ($zakat->status_pz === 'disalurkan')
                                                                    <span class="badge bg-info rounded-0 fw-semibold">
                                                                        Disalurkan Untuk Umat
                                                                    </span>
                                                                @else
                                                                    <span class="badge bg-success rounded-0 fw-semibold">
                                                                        Diterima Oleh Amil
                                                                    </span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6" class="p-4 py-5">
                                                                <p
                                                                    class="block font-semibold text-sm text-center text-slate-800">
                                                                    Belum ada data zakat yang telah di post.
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                                            {{-- Pagination --}}
                                            <div class="d-flex justify-content-between align-items-center py-3">
                                                <!-- Bagian info jumlah data -->
                                                <div class="text-muted">
                                                    Showing
                                                    <b>{{ ($zakats->currentPage() - 1) * $zakats->perPage() + 1 }}-{{ min($zakats->currentPage() * $zakats->perPage(), $zakats->total()) }}</b>
                                                    of
                                                    {{ $zakats->total() }}
                                                </div>

                                                <!-- Bagian tombol pagination -->
                                                <nav>
                                                    <ul class="pagination mb-0">
                                                        <!-- Tombol Previous -->
                                                        @if ($zakats->onFirstPage())
                                                            <li class="page-item disabled">
                                                                <span class="page-link">Prev</span>
                                                            </li>
                                                        @else
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $zakats->previousPageUrl() }}">Prev</a>
                                                            </li>
                                                        @endif

                                                        <!-- Tombol Halaman -->
                                                        @foreach ($zakats->links()->elements[0] as $page => $url)
                                                            @if ($page == $zakats->currentPage())
                                                                <li class="page-item active">
                                                                    <span class="page-link">{{ $page }}</span>
                                                                </li>
                                                            @else
                                                                <li class="page-item">
                                                                    <a class="page-link"
                                                                        href="{{ $url }}">{{ $page }}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                        <!-- Tombol Next -->
                                                        @if ($zakats->hasMorePages())
                                                            <li class="page-item">
                                                                <a class="page-link"
                                                                    href="{{ $zakats->nextPageUrl() }}">Next</a>
                                                            </li>
                                                        @else
                                                            <li class="page-item disabled">
                                                                <span class="page-link">Next</span>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
