@extends('layouts.master')
@section('title',"judul")
@section('content')
	<!-- ======= Hero Section ======= -->
  	<section id="hero">
    	<div class="hero-container">
        <div style="height: 45vh; width: 2px;"></div>
    		<h1 class="d-none d-md-inline-block" style="text-shadow: 2px 4px 8px #000;">Lomba Gerak Jalan Proklamasi<br>Tahun 2024</h1>
    	</div>
  	</section><!-- End Hero -->

  	@include('partials.menu')

	<main id="main">

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="about">
      <div class="container">
        <div class="section-title">
            <h2>Rute</h2>
            <p>Rute Gerak Jalan Proklamasi untuk 8Km dan 17Km</p>
        </div>
        <div class="row row-cols-2">
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/rute8.jpeg')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/rute17.jpeg')}}" class="img-fluid" alt="">
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
                <p class="fw-bold">A. Kategori Perlombaan</p>
            		<p>Kategori perlombaan gerak jalan proklamasi Tahun 2024 dibagi menjadi 2 kategori diantaranya :</p>
            		<ul>
              			<li><i class="ri-check-double-line"></i> Kategori Putra jarak tempuh 17 KM</li>
              			<li><i class="ri-check-double-line"></i> Kategori Putri jarak tempuh 8 KM</li>
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
                <p>Formasi barisan dalam perlombaan Gerak Jalan Proklamasi Tahun 2024 sebagai berikut :</p>
                <ul>
                    <li><i class="ri-check-double-line"></i> Berisikan 10 orang anggota barisan dan 1 orang komandan barisan</li>
                    <li><i class="ri-check-double-line"></i> Bentuk formasi 2 berbanjar ke belakang dengan masing-masing barisan terdiri dari 5 orang</li>
                    <li><i class="ri-check-double-line"></i> Komandan barisan berada disamping kanan barisan</li>
                </ul>
                <p class="fw-bold">D. Pakaian dan Kelengkapan</p>
                <p>Formasi barisan dalam perlombaan Gerak Jalan Proklamasi Tahun 2024 sebagai berikut :</p>
                <ul>
                    <li><i class="ri-check-double-line"></i> Pakaian olahraga lengkap dengan sepatu serta kelengkapan lainnya yang memenuhi etika kesopanan dan kepatutan</li>
                    <li><i class="ri-check-double-line"></i> Pakaian peserta yang melanggar etika kesopanan dan kepatutan tidak dizinkan untuk <span class="fst-italic">start</span></li>
                    <li><i class="ri-check-double-line"></i> Diperbolehkan menggunakan pakaian kreasi tetapi tetap tidak melanggar etika kesopanan dan kepatutan</li>
                </ul>
                
            		<!--<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            		<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            		<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            		<p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>-->
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
            <h5 class="text-light">Bagi yang telah mencoba mendaftar <span class="text-danger">sebelum pendaftaran dibuka</span> agar dapat mendaftar kembali</h5>
          @endif
      		<p>Pilih kategori sesuai dengan data kepesertaan anda</p>
      	</div>
        @if($katLomba)
          <div class="row">
            @foreach($katLomba as $item)
            <div class="col-lg-6 col-md-6">
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
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki
        

        //document.getElementById("id_lomba").addEventListener('change', function(){
        //  alert(this.value)
        //})
    });
  </script>
@endsection