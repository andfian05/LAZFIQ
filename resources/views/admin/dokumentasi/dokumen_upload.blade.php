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
                        <h5 class="card-title fw-semibold mb-3">
                            @if (isset($editDoc))
                                Update Dokumentasi
                            @elseif (isset($showDoc))
                                Detail Dokumentasi
                            @else
                                Upload Dokumentasi
                            @endif
                        </h5>
                        <div class="card">
                            <div class="card-body">
                                <form
                                    action="{{ isset($editDoc) ? route('documentation.update', $editDoc->id) : route('documentation.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($editDoc))
                                        @method('PUT')
                                    @endif
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tanggal</label>
                                                @if (isset($showDoc))
                                                    <input type="text" name="tanggal"
                                                        class="form-control @error('tanggal') is-invalid @enderror"
                                                        id="" aria-describedby=""
                                                        value="{{ \Carbon\Carbon::parse($showDoc->tanggal_kegiatan)->locale('id')->translatedFormat('l, d F Y') }}"
                                                        disabled>
                                                @else
                                                    <input type="date" name="tanggal"
                                                        class="form-control @error('tanggal') is-invalid @enderror"
                                                        id="" aria-describedby=""
                                                        value="{{ isset($editDoc) ? $editDoc->tanggal_kegiatan : old('tanggal') }}">
                                                @endif
                                                @error('tanggal')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Kategori</label>
                                                <select name="kategori" id=""
                                                    class="form-control @error('kategori') is-invalid @enderror"
                                                    {{ isset($showDoc) ? 'disabled' : '' }}>
                                                    @if (!isset($editDoc) || !isset($showDoc))
                                                        <option value="">--- Pilih ---</option>
                                                    @endif
                                                    @foreach ($kategori as $key => $value)
                                                        <option value="{{ $key }}"
                                                            {{ (isset($editDoc) && $editDoc->kategori_kegiatan == $key) || (isset($showDoc) && $showDoc->kategori_kegiatan == $key) ? 'selected' : '' }}>
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('kategori')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Judul</label>
                                                <input type="text" name="judul"
                                                    class="form-control @error('judul') is-invalid @enderror" id=""
                                                    aria-describedby=""
                                                    value="{{ isset($editDoc) ? $editDoc->judul_kegiatan : (isset($showDoc) ? $showDoc->judul_kegiatan : old('judul')) }}"
                                                    {{ isset($showDoc) ? 'disabled' : '' }}>
                                                @error('judul')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Deskripsi</label>
                                                <input type="text" name="deskripsi"
                                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                                    id="" aria-describedby=""
                                                    value="{{ isset($editDoc) ? $editDoc->deskripsi_kegiatan : (isset($showDoc) ? $showDoc->deskripsi_kegiatan : old('deskripsi')) }}"
                                                    {{ isset($showDoc) ? 'disabled' : '' }}>
                                                @error('deskripsi')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Tempat Upload</label>
                                                <input type="file" name="foto"
                                                    value="{{ isset($editDoc) ? $editDoc->foto_kegiatan : (isset($showDoc) ? $showDoc->foto_kegiatan : old('foto')) }}"
                                                    class="form-control @error('foto') is-invalid @enderror"
                                                    id="" aria-describedby=""
                                                    {{ isset($showDoc) ? 'disabled' : '' }}>
                                                @if (isset($editDoc) || isset($showDoc))
                                                    <p class="mt-2">Foto saat ini:</p>
                                                    <img src="{{ asset('storage/' . (isset($editDoc) ? $editDoc->foto_kegiatan : $showDoc->foto_kegiatan)) }}"
                                                        alt="Foto" width="120">
                                                @endif
                                                <div id="" class="form-text">
                                                    Format Foto : PNG, JPG, PDF, dan JPEG
                                                </div>
                                                @error('foto')
                                                    <div class="form-control-muted">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    @if (!isset($showDoc))
                                        <div class="d-flex justify-content-center align-items-center gap-3">
                                            @if (isset($editDoc))
                                                <a href="{{ route('documentation.index') }}"
                                                    class="btn btn-secondary w-48 py-8 fs-4 mb-4 rounded-2">
                                                    Kembali
                                                </a>
                                            @endif

                                            <button type="submit" class="btn btn-primary w-48 py-8 fs-4 mb-4 rounded-2">
                                                {{ isset($editDoc) ? 'Perbaiki Dokumentasi' : 'Simpan Dokumentasi' }}
                                            </button>
                                        </div>
                                    @else
                                        <div class="d-flex justify-content-end align-items-end gap-3">
                                            <a href="{{ route('documentation.index') }}"
                                                class="btn btn-secondary w-48 py-8 fs-4 mb-4 rounded-2">
                                                Kembali
                                            </a>
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-4">Laporan Dokumentasi</h5>
                                <div class="table-responsive" id="no-more-tables">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">No</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Gambar</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @php
                                                $no = 1;
                                            @endphp
                                            @forelse ($documentations as $documentation)
                                                <tr>
                                                    <td scope="row" data-title="No" class="text-center">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td data-title="Tanggal">
                                                        {{ \Carbon\Carbon::parse($documentation->tanggal_kegiatan)->locale('id')->translatedFormat('l, d F Y') }}
                                                    </td>
                                                    <td data-title="Gambar">
                                                        @if (!empty($documentation->foto_kegiatan))
                                                            <img src="{{ asset('storage/' . $documentation->foto_kegiatan) }}"
                                                                alt="foto" width="90" height="90">
                                                        @else
                                                            <img src="{{ asset('Gp/assets/img/portfolio/portfolio-1.jpg') }}"
                                                                alt="foto" width="90" height="90">
                                                        @endif
                                                    </td>
                                                    <td data-title="Kategori">
                                                        {{ $documentation->kategori_kegiatan }}
                                                    </td>
                                                    <th class="d-flex justify-content-center">
                                                        <a class="btn btn-secondary btn-sm me-2"
                                                            href="{{ route('documentation.index', ['show' => $documentation->id]) }}">
                                                            Melihat
                                                        </a>
                                                        <a class="btn btn-warning btn-sm me-2"
                                                            href="{{ route('documentation.index', ['edit' => $documentation->id]) }}">
                                                            Update
                                                        </a>
                                                        <button class="btn btn-danger btn-sm me-2" data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            data-id="{{ $documentation->id }}">
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
                                            <b>{{ ($documentations->currentPage() - 1) * $documentations->perPage() + 1 }}-{{ min($documentations->currentPage() * $documentations->perPage(), $documentations->total()) }}</b>
                                            of
                                            {{ $documentations->total() }}
                                        </div>

                                        <!-- Bagian tombol pagination -->
                                        <nav>
                                            <ul class="pagination mb-0">
                                                <!-- Tombol Previous -->
                                                @if ($documentations->onFirstPage())
                                                    <li class="page-item disabled">
                                                        <span class="page-link">Prev</span>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $documentations->previousPageUrl() }}">Prev</a>
                                                    </li>
                                                @endif

                                                <!-- Tombol Halaman -->
                                                @foreach ($documentations->links()->elements[0] as $page => $url)
                                                    @if ($page == $documentations->currentPage())
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
                                                @if ($documentations->hasMorePages())
                                                    <li class="page-item">
                                                        <a class="page-link"
                                                            href="{{ $documentations->nextPageUrl() }}">Next</a>
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

        <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="https://www.linkedin.com/in/fianfi/" target="_blank"
                    class="pe-1 text-primary text-decoration-underline">AndFath</a>
            </p>
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
            var documentationId = button.getAttribute('data-id'); // Ambil data-id

            // Update action form dengan ID yang dipilih
            var form = deleteModal.querySelector('#deleteForm');
            form.action = '/documentation/' + documentationId;
        });
    </script>
    </div>
    </div>
@endsection
