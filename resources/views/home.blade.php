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
                                <img src="{{ asset('Admin/src/assets/images/profile/user-1.jpg') }}" alt="profile"
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
            <!--  Grafik Infaq -->
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Grafik Infaq</h5>
                                </div>
                                <div>
                                    <form id="filterFormInfaq">
                                        <select id="monthYearSelectInfaq" class="form-select">
                                            @foreach ($cimonthsYears as $itemci)
                                                @php
                                                    $monthYear =
                                                        $itemci->year .
                                                        '-' .
                                                        str_pad($itemci->month, 2, '0', STR_PAD_LEFT);
                                                @endphp
                                                <option value="{{ $monthYear }}"
                                                    {{ request('month_year') == $monthYear ? 'selected' : '' }}>
                                                    {{ \Carbon\Carbon::createFromFormat('Y-m', $monthYear)->locale('id')->translatedFormat('F Y') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <canvas id="barChartInfaq" class=" w-60 h-48 m-0"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Grafik Zakat -->
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Grafik Zakat</h5>
                                </div>
                                <div>
                                    <form id="filterFormZakat">
                                        <select id="yearSelectZakat" class="form-select">
                                            @foreach ($czYears as $item)
                                                <option value="{{ $item->year }}"
                                                    {{ request('year') == $item->year ? 'selected' : '' }}>
                                                    {{ $item->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <canvas id="barChartZakat" class=" w-60 h-48 m-0"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Grafik Qurban -->
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold">Grafik Qurban</h5>
                                </div>
                                <div>
                                    <form id="filterFormQurban">
                                        <select id="yearSelectQurban" class="form-select">
                                            @foreach ($cqYears as $item)
                                                <option value="{{ $item->year }}"
                                                    {{ request('year') == $item->year ? 'selected' : '' }}>
                                                    {{ $item->year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <canvas id="barChartQurban" class=" w-60 h-48 m-0"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Footer -->
            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="https://www.linkedin.com/in/fianfi/" target="_blank"
                        class="pe-1 text-primary text-decoration-underline">AndFath</a>
                </p>
            </div>
        </div>
    </div>

    @if (session('error'))
        <!-- Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="errorModalLabel">Terjadi Kesalahan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body text-center">
                        <p>{{ session('error') }}</p>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Script untuk trigger modal -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();

                // Otomatis tertutup setelah 10 detik
                setTimeout(() => {
                    errorModal.hide();
                    // Menghapus session error setelah modal tertutup
                    @this.session.remove('error');
                }, 10000);
            });
        </script>
    @endif
@endsection

@section('js.chart')
    <script>
        // Create Global Variables
        let chartInfaq;
        let chartZakat;
        let chartQurban;



        // Create Function for Convert to IDR by Value
        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);
        }



        // Create a Function to Process Charts from Infaq Data
        function getDataInfaq() {
            $.ajax({
                url: '/infaq-chart-data',
                method: 'GET',
                dataType: 'json',
                data: {
                    'month_year': $("#monthYearSelectInfaq").val(),
                },
                success: function(data) {
                    const monthYear = data.monthYear;
                    const infaqData = data.infaqData;

                    const ctx = document.getElementById('barChartInfaq').getContext('2d');

                    // Destroy the chart Infaq if it already exists to avoid duplication
                    if (chartInfaq) {
                        chartInfaq.destroy();
                    }

                    // Create a new chart instance for chart Infaq
                    chartInfaq = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Pemasukan', 'Pengeluaran'],
                            datasets: [{
                                label: `Data Infaq untuk Bulan ${monthYear}`,
                                data: [infaqData.pemasukan, infaqData.pengeluaran],
                                backgroundColor: ['rgb(75,192,192)', 'rgb(255,99,132)'],
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return formatRupiah(value); // Format Y-axis
                                        },
                                        font: {
                                            size: 10 // Adjust Y-axis font size
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            size: 10 // Adjust X-axis font size
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return formatRupiah(context.raw); // Format tooltip
                                        }
                                    }
                                },
                                legend: {
                                    labels: {
                                        font: {
                                            size: 10 // Adjust legend font size
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        // Create a Function to Process Charts from Zakat Data
        function getDataZakat() {
            $.ajax({
                url: '/zakat-chart-data',
                method: 'GET',
                dataType: 'json',
                data: {
                    'year': $("#yearSelectZakat").val(),
                },
                success: function(data) {
                    const year = data.year;
                    const zakatData = data.zakatData;

                    const ctx = document.getElementById('barChartZakat').getContext('2d');

                    // Destroy the chart Zakat if it already exists to avoid duplication
                    if (chartZakat) {
                        chartZakat.destroy();
                    }

                    // Create a new chart instance for chart Zakat
                    chartZakat = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Zakat Uang', 'Zakat Beras'],
                            datasets: [{
                                    label: 'Zakat Uang (Rp)',
                                    data: [zakatData.zakatu, 0],
                                    backgroundColor: 'rgb(75,192,192)',
                                    yAxisID: 'y1',
                                },
                                {
                                    label: 'Zakat Beras (Kg)',
                                    data: [0, zakatData.zakatb],
                                    backgroundColor: 'rgb(54,162,235)',
                                    yAxisID: 'y2',
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y1: {
                                    beginAtZero: true,
                                    position: 'left', // Place on the left side
                                    title: {
                                        display: true,
                                        text: 'Rupiah (Rp)', // Label for the first Y-axis
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return formatRupiah(value); // Format Rupiah
                                        },
                                        font: {
                                            size: 10 // Adjust Y-axis font size
                                        }
                                    }
                                },
                                y2: {
                                    beginAtZero: true,
                                    position: 'right', // Place on the right side
                                    title: {
                                        display: true,
                                        text: 'Kilogram (Kg)', // Label for the second Y-axis
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return `${value} Kg`; // Format as Kg
                                        },
                                        font: {
                                            size: 10 // Adjust Y-axis font size
                                        }
                                    },
                                    grid: {
                                        drawOnChartArea: false, // Avoid overlapping grids
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            size: 10 // Adjust X-axis font size
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            if (context.dataset.yAxisID === 'y1') {
                                                return formatRupiah(context.raw); // Tooltip for Rupiah
                                            } else if (context.dataset.yAxisID === 'y2') {
                                                return `${context.raw} Kg`; // Tooltip for Kilogram
                                            }
                                        }
                                    }
                                },
                                legend: {
                                    labels: {
                                        font: {
                                            size: 10 // Adjust legend font size
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        // Create a Function to Process Charts from Qurban Data
        function getDataQurban() {
            $.ajax({
                url: '/qurban-chart-data',
                method: 'GET',
                dataType: 'json',
                data: {
                    'year': $("#yearSelectQurban").val(),
                },
                success: function(data) {
                    const year = data.year;
                    const qurbanData = data.qurbanData;

                    const ctx = document.getElementById('barChartQurban').getContext('2d');

                    // Destroy the chart Qurban if it already exists to avoid duplication
                    if (chartQurban) {
                        chartQurban.destroy();
                    }

                    // Create a new chart instance for chart Qurban
                    chartQurban = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Sapi', 'Kambing'],
                            datasets: [{
                                label: `Data Hewan Qurban untuk Tahun ${year}`,
                                data: [qurbanData.sapi, qurbanData.kambing],
                                backgroundColor: ['rgb(75,192,192)', 'rgb(54,162,235)'],
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        callback: function(value) {
                                            return `${value} ekor`; // Add units in Y-axis
                                        },
                                        font: {
                                            size: 10 // Adjust Y-axis font size
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            size: 10 // Adjust X-axis font size
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return `${context.raw} ekor`; // Add units in tooltip
                                        }
                                    }
                                },
                                legend: {
                                    labels: {
                                        font: {
                                            size: 10 // Adjust legend font size
                                        }
                                    }
                                }
                            }
                        }
                    });
                },
                error: function(error) {
                    console.error("Error fetching data:", error);
                }
            });
        }



        // Load Chart
        $(document).ready(function () {
            // Trigger data loading on page load
            getDataInfaq();
            getDataZakat();
            getDataQurban();
            


            // Reload chart data when dropdown value changes
            // Chart Infaq Data
            $("#monthYearSelectInfaq").change(function() {
                getDataInfaq();
            });

            // Chart Zakat Data
            $("#yearSelectZakat").change(function() {
                getDataZakat();
            });

            // Chart Qurban Data
            $("#yearSelectQurban").change(function() {
                getDataQurban();
            });
        })
    </script>
@endsection
