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

      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-3">Input Laporan Zakat</h5>
              <div class="alert alert-info" role="alert">
                 Zakat Dihitung Setiap Hari Pada Bulan Ramadhan.   
              </div>

              <div class="card">
              <div class="card-body">
                  <form>
                    
                        <a href="/cek_zakat" class="btn btn-outline-primary">Mengecek Data</a>
                       
                    
                  </form>
                </div>
              </div>


              <div class="card">
                <div class="card-body">
                <div class="alert alert-warning text-center" role="alert">
                 Kalkulator Zakat   
                </div>
                  <form id="form1" name="form1">
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Waktu</label>
                        <input type="time" class="form-control" id="" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Muzakki Pertama</label>
                        <input type="text" class="form-control" id="" aria-describedby="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Keluarga Besar</label>
                        <textarea name="" class="form-control" cols="3" rows="3"></textarea>
                    </div>
                    <div class="mb-3">

                        <label for="" class="form-label">Zakat Berupa ?</label>
                        
                        <select class="form-control" name="kategori" id="kategori" value="" onclick="tampilkan()">
                            <option value="">--- Pilih ---</option>
                            <option value="beras">Beras</option>
                            <option value="uang">Uang</option>
                 
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
                                <input type="number" class="form-control" id="" aria-describedby="">
                                
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
                                <input type="number" class="form-control" id="" aria-describedby="">
                                
                            </div>
                            
                
                            </div>
                            `;
                        } 
                    }
                    </script>

                    <div class="container">
                        <p id="container"></p>
                    </div>
                    

                    <div class="mb-3">

                        <label for="" class="form-label">Status Zakat ?</label>
                        
                        <select class="form-control" name="" id="" value="" >
                            <option value="">--- Pilih ---</option>
                            <option value="diterima">Diterima Oleh Amil</option>
                            <option value="menunggu">Menunggu</option>
                 
                        </select>
                        
                    </div><br><br>
                    
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Tambah Data</button>
                    
                  </form>
                </div>
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