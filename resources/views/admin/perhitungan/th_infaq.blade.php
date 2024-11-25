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
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{asset('Admin/src/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
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



      <!--  Header End -->
      <div class="container-fluid">
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Laporan Perhitungan Infaq</h5>
              <div class="table-responsive" id="no-more-tables">
                            
                    <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Saldo Akhir</th>
                                        <!-- <th scope="col">Status Infaq</th> -->
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    
                                        <tr>
                                            <td scope="row" data-title="No" class="text-center">1</td>
                                            <td data-title="Tanggal">Selasa, 1 Januari 2024</td>
                                            <td data-title="Waktu">10.00</td>
                                            <td data-title="Saldo Akhir">Rp. 40,000,000</td>
                                            <!-- <td data-title="Status Akhir">Tersimpan Dalam Kas Masjid</td> -->
                                            <th class="d-flex justify-content-center">
                                                <a class="btn btn-secondary btn-sm me-2"
                                                    href="/detail_cek_infaq"> Melihat</a>
                                                
                                                <a class="btn btn-danger btn-sm me-2"
                                                    href=""> Hapus</a>
                                                
                                            </th>
                                        </tr>

                                        
                                
                                </tbody>

                    </table>

                </div>
                </div>
            </div>
        </div>
      </div>



        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://www.linkedin.com/in/fianfi/" target="_blank" class="pe-1 text-primary text-decoration-underline">AndFat</a></p>
        </div>
      </div>
    </div>
  </div>


@endsection