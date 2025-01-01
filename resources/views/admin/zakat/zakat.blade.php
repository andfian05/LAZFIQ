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

        <!--  Header End -->
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Laporan Zakat</h5>
                            <a href="{{ route('postZakat.create') }}" class="btn btn-primary mb-3">
                                Tambah Data
                            </a>
                            <a href="#" class="btn btn-success mb-3">
                                Excel
                            </a>
                            <div class="table-responsive" id="no-more-tables">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Total Zakat (Uang)</th>
                                            <th scope="col">Total Zakat (Beras)</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($zakats as $zakat)
                                            <tr>
                                                <td scope="row" data-title="No" class="text-center">
                                                    {{ $no++ }}
                                                </td>
                                                <td data-title="Tanggal">
                                                    {{ \Carbon\Carbon::parse($zakat->tanggal_pz)->locale('id')->translatedFormat('l, d F Y') }}
                                                </td>
                                                <td data-title="TZ (Uang)">
                                                    Rp. {{ number_format($zakat->zakat_uang, 2, ',', '.') }}
                                                </td>
                                                <td data-title="TZ (Beras)">
                                                    {{ $zakat->zakat_beras }} Kilogram
                                                </td>
                                                <th class="d-flex justify-content-center">
                                                    <a class="btn btn-secondary btn-sm me-2"
                                                        href="{{ route('postZakat.show', $zakat->id) }}">
                                                        Melihat
                                                    </a>
                                                    <a class="btn btn-warning btn-sm me-2"
                                                        href="{{ route('postZakat.edit', $zakat->id) }}">
                                                        Update
                                                    </a>
                                                    <button class="btn btn-danger btn-sm me-2" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal" data-id="{{ $zakat->id }}">
                                                        Hapus
                                                    </button>
                                                </th>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="p-4 py-5">
                                                    <p class="block font-semibold text-sm text-center text-slate-800">
                                                        Belum ada data yang tersimpan di dalam database.
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
                                                    <a class="page-link" href="{{ $zakats->previousPageUrl() }}">Prev</a>
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
                                                    <a class="page-link" href="{{ $zakats->nextPageUrl() }}">Next</a>
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

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="https://www.linkedin.com/in/fianfi/" target="_blank"
                        class="pe-1 text-primary text-decoration-underline">AndFath</a>
                </p>
            </div>
        </div>
    </div>

    {{-- Alert Modal --}}
    @if (session('success') || session('error-process'))
        <!-- Modal -->
        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header {{ session('success') ? 'bg-success' : 'bg-danger' }} text-white">
                        <h5 class="modal-title" id="alertModalLabel">
                            {{ session('success') ? 'Berhasil' : 'Gagal' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body text-center">
                        <p>{{ session('success') ?? session('error-process') }}</p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn {{ session('success') ? 'btn-success' : 'btn-danger' }}"
                            data-bs-dismiss="modal">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Script untuk trigger modal --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const alertModal = new bootstrap.Modal(document.getElementById('alertModal'));
                alertModal.show();

                // Otomatis tertutup setelah 10 detik
                setTimeout(() => alertModal.hide(), 10000);
            });
        </script>
    @endif

    {{-- Modal Konfirmasi Hapus  --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!-- Body Modal -->
                <div class="modal-body">
                    <p class="text-center">Apakah kamu yakin ingin menghapus data ini?</p>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Konfirmasi Hapus  --}}
    <script type="text/javascript">
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget; // Tombol yang memicu modal
            var zakatId = button.getAttribute('data-id'); // Ambil data-id

            // Update action form dengan ID yang dipilih
            var form = deleteModal.querySelector('#deleteForm');
            form.action = '/post-zakat/' + zakatId;
        });
    </script>
    </div>
@endsection
