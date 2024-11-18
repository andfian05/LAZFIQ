@extends('pembaca.layout.index')
@section('content')

    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-5 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="assets/img/" height="34" alt="" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-lg-center align-items-start">
              <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#menyalurkan">Menyalurkan</a></li>
              <li class="nav-item px-3 px-xl-4"><a class="nav-link fw-medium" aria-current="page" href="#detailmenyalurkan">Detail Menyalurkan</a></li>
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
            <h5 class="text-secondary">Menyalurkan</h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Amal Jariyah Jama'ah</h3>
          </div>
          <div class="row flex-center">
            <div class="col-lg-3 col-sm-6 mb-6">
              <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
                <div class="card-body p-xxl-5 p-4"> <img src="{{ asset('Zakat/public/assets/img/category/INFAQ.png') }}" width="120" alt="Service" />
                  <h4 class="mb-3">Infaq</h4>
                  <p class="mb-0 fw-medium"></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-6">
              <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
                <div class="card-body p-xxl-5 p-4"> <img src="{{ asset('Zakat/public/assets/img/category/ZAKAT.png') }}" width="120" alt="Service" />
                  <h4 class="mb-3">Zakat</h4>
                  <p class="mb-0 fw-medium"></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-6">
              <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
                <div class="card-body p-xxl-5 p-4"> <img src="{{ asset('Zakat/public/assets/img/category/QURBAN.png') }}" width="120" alt="Service" />
                  <h4 class="mb-3">Qurban</h4>
                  <p class="mb-0 fw-medium"></p>
                </div>
              </div>
            </div>
            <!-- <div class="col-lg-3 col-sm-6 mb-6">
              <div class="card service-card shadow-hover rounded-3 text-center align-items-center">
                <div class="card-body p-xxl-5 p-4"> <img src="assets/img/category/QUR'AN.png" width="120" alt="Service" />
                  <h4 class="mb-3">Wakaf</h4>
                  <p class="mb-0 fw-medium"></p>
                </div>
              </div>
            </div> -->
          </div>
        </div><!-- end of .container-->

      </section>
      


      <section class="pt-5" id="detailmenyalurkan">

        <div class="container">
          <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img src="{{ asset('Zakat/public/assets/img/dest/shape.svg') }}" alt="destination" /></div>
          <div class="mb-7 text-center">
            <h5 class="text-secondary"> Detail Penyaluran </h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Amal Jariyah Jama'ah</h3>
          </div>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card overflow-hidden shadow"> <img class="card-img-top" src="{{ asset('Zakat/public/assets/img/dest/Bersedekah.jpeg') }}" alt="" />
                <div class="card-body py-4 px-3">
                  <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
                    <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none " >Infaq</a></h4><span class="fs-1 fw-medium"></span>
                  </div>
                  <!-- <div class="d-flex align-items-center"> <img src="assets/img/dest/navigation.svg" style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">Rp. 40,000,000,-</span></div> -->
                  <p class="fw-medium mb-4">Uang Yang Diterima Dari Jama'ah Akan Digunakan Untuk Kemaslahatan Umat Dan Kemakmuran Masjid.</p>
                  
                  <a class="btn btn-primary bg-gradient-primary-to-secondary  px-3 mb-2 mb-lg-0 rounded-pill" href="/lazfiq/sedekah"> <i class="fa-solid fa-graduation-cap"></i>&nbsp;Melihat Laporan</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card overflow-hidden shadow"> <img class="card-img-top" src="{{ asset('Zakat/public/assets/img/dest/Berzakat.jpeg') }}" alt="" />
                <div class="card-body py-4 px-3">
                  <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
                    <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none">Zakat Fitrah & Profesi</a></h4><span class="fs-1 fw-medium"></span>
                  </div>
                  <!-- <div class="d-flex align-items-center"> <img src="assets/img/dest/navigation.svg" style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">Rp. 14,000,000,-</span></div> -->
                  <p class="fw-medium mb-4">Zakat Fitrah Dan Zakat Profesi Yang Diterima Dari Jama'ah Akan Diberikan Langsung Kepada Mustahiq Zakat.</p>
                  
                  <a class="btn btn-primary bg-gradient-primary-to-secondary  px-3 mb-2 mb-lg-0 rounded-pill" href="/lazfiq/zakat"> <i class="fa-solid fa-graduation-cap"></i>&nbsp;Melihat Laporan</a>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 mb-4">
              <div class="card overflow-hidden shadow"> <img class="card-img-top" src="{{ asset('Zakat/public/assets/img/dest/Berqurban.jpeg') }}" alt="" />
                <div class="card-body py-4 px-3">
                  <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
                    <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none">Qurban</a></h4><span class="fs-1 fw-medium"></span>
                  </div>
                  <p class="fw-medium mb-4">Hewan Qurban Yang Diterima Dari Jama'ah Akan Didistribusikan Kepada Masyarakat Berhak Menerima.</p>
                  
                  <a class="btn btn-primary bg-gradient-primary-to-secondary  px-3 mb-2 mb-lg-0 rounded-pill" href="/lazfiq/qurban"> <i class="fa-solid fa-graduation-cap"></i>&nbsp;Melihat Laporan</a>
                </div>
              </div>
            </div>

            <!-- <div class="col-md-4 mb-4">
              <div class="card overflow-hidden shadow"> <img class="card-img-top" src="assets/img/dest/Berqurban.jpeg" alt="" />
                <div class="card-body py-4 px-3">
                  <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
                    <h4 class="text-secondary fw-medium"><a class="link-900 text-decoration-none stretched-link" href="#!">Wakaf</a></h4><span class="fs-1 fw-medium"></span>
                  </div>
                  <div class="d-flex align-items-center"> <img src="assets/img/dest/navigation.svg" style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">1000 Meter Tanah</span></div>
                  <div class="d-flex align-items-center"> <img src="assets/img/dest/navigation.svg" style="margin-right: 14px" width="20" alt="navigation" /><span class="fs-0 fw-medium">30 AL Qur'an</span></div>
                </div>
              </div>
            </div> -->
          </div>
        </div><!-- end of .container-->

      </section>

      <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Dokumentasi</h2>
            <p class="font-cursive text-capitalize">Penyaluran Amal Jariyah Jama'ah</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">Infaq Shodaqoh</li>
                <li data-filter=".filter-card">Zakat Fitrah & Profesi</li>
                <li data-filter=".filter-web">Qurban</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-1.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Santunan Anak Yatim</h4>
                  <p>Infaq ....</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-1.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-2.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Qurban Untuk Mustahiq</h4>
                  <p>Qurban ...</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-2.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-3.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Santunan Anak Yatim</h4>
                  <p>Infaq ....</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-3.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-4.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Zakat Untuk Mustahiq</h4>
                  <p>Zakat ...</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-4.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-5.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Qurban Untuk Mustahiq</h4>
                  <p>Qurban ...</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-5.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-6.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Santunan Anak Yatim</h4>
                  <p>Infaq ....</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-6.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-7.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Zakat Untuk Mustahiq</h4>
                  <p>Zakat ...</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-7.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-8.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Zakat Untuk Mustahiq</h4>
                  <p>Zakat ...</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-8.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="{{asset('Gp/assets/img/portfolio/portfolio-9.jpg')}}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Qurban Untuk Mustahiq</h4>
                  <p>Qurban ...</p>
                  <div class="portfolio-links">
                    <a href="{{asset('Gp/assets/img/portfolio/portfolio-9.jpg')}}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section>
     

      <section class="pt-8">

        <div class="container">
          <div class="py-8 px-5 position-relative text-center" style="background-color: rgba(223, 215, 249, 0.199);border-radius: 129px 20px 20px 20px;">
            <div class="position-absolute start-100 top-0 translate-middle ms-md-n3 ms-n4 mt-3"> <img src="{{ asset('Zakat/public/assets/img/cta/send.png') }}" style="max-width:70px;" alt="send icon" /></div>
            <div class="position-absolute end-0 top-0 z-index--1"> <img src="{{ asset('Zakat/public/assets/img/cta/shape-bg2.png') }}" width="264" alt="cta shape" /></div>
            <div class="position-absolute start-0 bottom-0 ms-3 z-index--1 d-none d-sm-block"> <img src="{{ asset('Zakat/public/assets/img/cta/shape-bg1.png') }}" style="max-width: 340px;" alt="cta shape" /></div>
            <div class="row justify-content-center">
              <div class="col-lg-10 col-md-9">
                <h2 class="text-secondary lh-1-7 mb-5">&quot;Bekerjalah Untuk Duniamu Seakan-Akan Engkau Akan Hidup Selamanya. Dan Bekerjalah Untuk Akhiratmu Seakan-Akan Engkau Akan Mati Besok Pagi.&quot;</h2>
                <h5 class="text-secondary">(H.R Ibnu Umar R.A) </h5>
                <!-- <form class="row g-3 align-items-center w-lg-75 mx-auto">
                  <div class="col-sm">
                    <div class="input-group-icon">
                      <input class="form-control form-little-squirrel-control" type="email" placeholder="Enter email " aria-label="email" /><img class="input-box-icon" src="assets/img/cta/mail.svg" width="17" alt="mail" />
                    </div>
                  </div>
                  <div class="col-sm-auto">
                    <button class="btn btn-danger orange-gradient-btn fs--1">Subscribe</button>
                  </div>
                </form> -->
              </div>
            </div>
          </div>
        </div>

      </section><br><br><br>
    


      <section class="pb-0 pb-lg-4">

        <div class="container">
          <div class="row">
            
        </div>

      </section>
    

    
    </main>
    

@endsection