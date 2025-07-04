@extends('layouts.master')
@section('title',"judul")
@section('content')
	<!-- ======= Hero Section ======= -->
  <div class="position-relative">
  	<section id="hero">
      <div class="hero-container">
        <!-- <h1>Lomba Gerak Jalan Proklamasi<br>Tahun 2024</h1>
        <a href="{{route('daftar-peserta')}}" class="btn-get-started scrollto">Daftar Peserta</a> -->
      </div>
    </section>
    <!-- End Hero -->
    <div class="position-absolute top-50 start-50 translate-middle">
      <div class="d-flex align-items-center">
        <img src="{{asset('img/top-banner-2025.jpeg')}}" style="width: 650px;" />
      </div>
    </div>
  </div>
  @include('partials.menu')

	<main id="main">

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="about">
      <div class="container">
        <div class="section-title">
            <h2>Rute</h2>
            <p>Rute Gerak Jalan Proklamasi untuk 8Km, 17Km, 45Km</p>
        </div>
        <div class="row row-cols-md-3 row-cols-1 g-3">
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/rute-8-2025.jpeg')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/rute-17-2025.jpeg')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/rute-45-2025.jpeg')}}" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      	<div class="container">

        	<div class="section-title">
          		<h2>Tentang Gerak Jalan Proklamasi</h2>
        	</div>

        	<div class="row content">
          		<div class="col-lg-6">
                <p class="fw-bold">A. Nomor Perlombaan</p>
            		<p>Nomor perlombaan gerak jalan proklamasi {{"Tahun ". $data?->tahun }} dibagi menjadi 3 Nomor diantaranya :</p>
            		<ul>
              			<li><i class="ri-check-double-line"></i> Gerak Jalan 8 KM (4 kategori Peserta)</li>
                    <li><i class="ri-check-double-line"></i> Gerak Jalan 17 KM (4 kategori Peserta)</li>
                    <li><i class="ri-check-double-line"></i> Gerak Jalan 45 KM (3 kategori Peserta /tanpa kategori (4) pelajar)</li>
            		</ul>
                <p class="fw-bold">B. Kategori Peserta</p>
                <p>Kategori Peserta dibagi menjadi 4 diantaranya :</p>
                <ul>
                    <li><i class="ri-check-double-line"></i> Kategori 1 : TNI / POLRI / SATPOL PP / Damkar / Basarnas / Polsus / Security / KPLP / BNPB / Beacukai</li>
                    <li><i class="ri-check-double-line"></i> Kategori 2 : OPD / Instansi Vertikal / PKK / GOW / Darmawanita / BUMN / BUMD/ Guru</li>
                    <li><i class="ri-check-double-line"></i> Kategori 3 : Umum / Ormas / Mahasiswa / RT / RW</li>
                    <li><i class="ri-check-double-line"></i> Kategori 4 : Pelajar</li>
                </ul>
              </div>
              <div class="col-lg-6 pt-4 pt-lg-0">
                <p class="fw-bold">C. Barisan</p>
                <p>Formasi barisan dalam perlombaan Gerak Jalan Proklamasi {{"Tahun ".$data?->tahun}} sebagai berikut :</p>
                <ul>
                    <li><i class="ri-check-double-line"></i> Berisikan 10 orang anggota barisan dan 1 orang komandan barisan</li>
                    <li><i class="ri-check-double-line"></i> Bentuk formasi 2 berbanjar ke belakang dengan masing-masing barisan terdiri dari 5 orang</li>
                    <li><i class="ri-check-double-line"></i> Komandan barisan berada disamping kanan barisan</li>
                </ul>
                <p class="fw-bold">D. Pakaian dan Kelengkapan</p>
                <p>Formasi barisan dalam perlombaan Gerak Jalan Proklamasi {{"Tahun ".$data?->tahun}} sebagai berikut :</p>
                <ul>
                    <li><i class="ri-check-double-line"></i> Pakaian olahraga lengkap dengan sepatu serta kelengkapan lainnya yang memenuhi etika kesopanan dan kepatutan</li>
                    <li><i class="ri-check-double-line"></i> Pakaian peserta yang melanggar etika kesopanan dan kepatutan tidak dizinkan untuk <span class="fst-italic">start</span></li>
                    <li><i class="ri-check-double-line"></i> Diperbolehkan menggunakan pakaian kreasi tetapi tetap tidak melanggar etika kesopanan dan kepatutan</li>
                </ul>
            		<a href="{{asset('REGULASI.GERAK.JALAN.pdf')}}" target="_blank" class="btn-learn-more">Download Pengumuman</a>
          		</div>
        	</div>
      	</div>
    </section><!-- End About Section -->

    <section id="services" class="about our-values section-bg">
        <div class="container">
          <div class="section-title">
              <h2>Pakta Integritas</h2>
              <p>Download dan isi Pakta Integritas sebagai lampiran untuk melakukan Pendaftaran Ulang sesuai jadwal yang telah ditentukan</p>
          </div>
          <div class="d-flex justify-content-center content">
            <a href="{{asset('PAKTA.INTEGRITAS.docx')}}" target="_blank" class="btn-learn-more">Download Pakta Integritas</a>
          </div>
        </div>
    </section><!-- End Our Values Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="cta">
      <div class="container">
      	<div class="section-title">
      		<h3>Ayo Mendaftar</h3>
          @if(!$buka)
            <h3>Pendaftaran Belum dibuka. <span class="text-danger">Bagi yang telah mencoba mendaftar</span> agar mendaftar kembali setelah pendaftaran dibuka</h3>
          @else
            <h3 class="text-bg-danger py-1"><i class="bi bi-flag"></i> Pendaftaran Telah dibuka !!! <i class="bi bi-flag"></i></h3>
            <h5 class="text-light">Bagi yang telah mencoba mendaftar <span class="text-danger">sebelum pendaftaran dibuka</span> agar dapat mendaftar kembali</h5>
          @endif
      		<p>Pilih kategori sesuai dengan data kepesertaan anda</p>
      	</div>
        @if($katLomba)
          <div class="row">
            @foreach($katLomba as $item)
            <div class="col-lg-4 col-md-12 mb-4">
              <a href="{{route('form-pendaftaran-peserta', ['id_lomba' => $item->id])}}">
                <div class="icon-box card card-body text-center">
                  
                  <div class="icon"><i class="bi bi-star-half" style="color: #ff689b;"></i></div>
                  <h4 class="title">{{$item->judul}}</h4>
                  <p class="description">{{$item->ket}}</p>
                  
                </div>
              </a>
            </div>
            @endforeach          
          </div>
        @endif
      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
    	<div class="container">
      	<div class="row row-cols-">
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/ppi.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/logo-igornas.png')}}" class="img-fluid" alt="">
          </div>
  				<div class="col d-flex align-items-center justify-content-center">
  					<img src="{{asset('/img/logo-kormi.png')}}" class="img-fluid" alt="">
  				</div>
  				<div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/koni.svg')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/logo-tpi.png')}}" class="img-fluid" alt="">
          </div>
  				<div class="col d-flex align-items-center justify-content-center">
  					<img src="{{asset('/img/logo-dispora.png')}}" class="img-fluid" alt="">
  				</div>
  				<div class="col d-flex align-items-center justify-content-center">
  					<img src="{{asset('/img/logo-hut-ri-79.png')}}" class="img-fluid" alt="">
  				</div>
      	</div>
    	</div>
    </section><!-- End Clients Section -->

	</main><!-- End #main -->
@endsection
@section('js-content')
  <script type="text/javascript">
      window.addEventListener('DOMContentLoaded', event => {
        var selIdLomba = 0;

        document.querySelectorAll('.carousel').forEach(el => {
            var inner = el.querySelector('.carousel-inner')
            console.log(inner.children[0].classList.add('active'))
        })
    });
  </script>
@endsection