@extends('pembaca.layout.index')
@section('content')

    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/" height="34" alt="" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
              <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="/">Kembali</a></li>
              
              <!-- <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#pengurus">Pengurus Masjid</a></li> -->
              
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
            <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-6 pt-md-0 hero-img" src="{{ asset('Zakat/public/assets/img/hero/LAFIQ.png') }}" alt="" /></div>
            <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
              <h4 class="fw-bold text-danger mb-3">Informasi Infaq, Zakat, Dan Qurban</h4>
              <h1 class="hero-title">Masjid Jami' Fajar Shiddiq</h1><br>
              <!-- <p class="mb-4 fw-medium">Kapuk Kalipasir RT 004/RW 011 Cengkareng, Jakarta Barat, 11720</p> -->
              <div class="text-center text-md-start"> <a class="btn btn-primary btn-lg me-md-4 mb-3 mb-md-0 border-0 primary-btn-shadow" href="https://maps.app.goo.gl/z6ocVLV4yZVy322x6" target="_blank" role="button">Lokasi Masjid</a>
                <!-- <div class="w-100 d-block d-md-none"></div><a href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo"><span class="btn btn-danger round-btn-lg rounded-circle me-3 danger-btn-shadow"> <img src="assets/img/hero/play.svg" width="15" alt="paly"/></span></a><span class="fw-medium">Play Demo</span> -->
                <!-- <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      
                      
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="pt-5 pt-md-9" id="menyalurkan">

        <div class="container">
          <div class="position-absolute z-index--1 end-0 d-none d-lg-block"><img src="{{ asset('Zakat/public/assets/img/category/shape.svg') }}" style="max-width: 200px" alt="service" /></div>
          <div class="mb-7 text-center">
            <h5 class="text-secondary">Detail Laporan</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Hewan Qurban</h3>
          </div>
          <div class="row flex-center">
          <div class="container-fluid">
            


              <div class="row">
             
              <div class="col-lg-16 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <!-- <h5 class="card-title fw-semibold mb-4">Detail Tahunan</h5> -->
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-3">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">Detail Laporan</h5>
                    </div>
                    <div>
                      <select class="form-select">
                        <option value="1">2023</option>
                        <option value="2">2024</option>
                        <option value="3">2025</option>
                        <option value="4">2026</option>  
                        <option value="dst">Dan Seterusnya</option>
                      </select>
                    </div>
                    </div>
                    
                    <div class="table-responsive">
                    
                    

                      <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-5">
                          <tr>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">No.</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Hewan Qurban (Sapi)</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Hewan Qurban (Kambing)</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Total Mustahiq Qurban</h6>
                            </th>
                            <th class="border-bottom-0">
                              <h6 class="fw-semibold mb-0">Status Qurban</h6>
                            </th>
                          </tr>
                        </thead>
                        <tbody>
      
                          <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                              <span class="badge bg-secondary rounded-0 fw-semibold">Selasa, 1 Januari 2023</span>
                              </div>                         
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">10 Ekor</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">15 Ekor</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">300 Orang</p>
                            </td>
                            <td class="border-bottom-0 d-flex align-items-center gap-2"> 
                              <span class="badge bg-info rounded-0 fw-semibold">Disalurkan Untuk Umat</span>
                             
                          
                            </td>
                            
                          </tr>
                          
                          
                          <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                            <td class="border-bottom-0">
                              <div class="d-flex align-items-center gap-2">
                              <span class="badge bg-secondary rounded-0 fw-semibold">Selasa, 2 Januari 2024</span>
                              </div>                         
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">20 Ekor</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">17 Ekor</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">400 Orang</p>
                            </td>
                            <td class="border-bottom-0 d-flex align-items-center gap-2"> 
                              <span class="badge bg-info rounded-0 fw-semibold">Disalurkan Untuk Umat</span>
                             
                          
                            </td>
                           
                          </tr> 
                         
                                              
                        </tbody>
                      </table>
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