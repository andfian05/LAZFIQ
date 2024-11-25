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
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Grafik Infaq</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">Januari 2024</option>
                      <option value="2">Februari 2024</option>
                      <option value="3">Maret 2024</option>
                      <option value="4">April 2024</option>
                      <option value="5">Mei 2024</option>
                      <option value="dts">Dan Seterusnya</option>
                    </select>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Grafik Zakat</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">Januari 2024</option>
                      <option value="2">Februari 2024</option>
                      <option value="3">Maret 2024</option>
                      <option value="4">April 2024</option>
                      <option value="5">Mei 2024</option>
                      <option value="dts">Dan Seterusnya</option>
                    </select>
                  </div>
                </div>
                <div id="chart"></div>
              </div>
            </div>
          </div>
          
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Grafik Qurban</h5>
                  </div>
                  <div>
                    <select class="form-select">
                      <option value="1">Januari 2024</option>
                      <option value="2">Februari 2024</option>
                      <option value="3">Maret 2024</option>
                      <option value="4">April 2024</option>
                      <option value="5">Mei 2024</option>
                      <option value="dts">Dan Seterusnya</option>
                    </select>
                  </div>
                </div>
                <div id="chart"></div>
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