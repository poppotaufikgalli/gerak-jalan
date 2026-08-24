@extends('layouts.master')
@section('title', "judul")
@section('content')
  <!-- ======= Hero Section ======= -->
  <div class="position-relative">
    <section id="hero">
      <div class="hero-container">
        <!-- <h1>Lomba Gerak Jalan Proklamasi<br>Tahun 2026</h1>
                                                                                                                          <a href="{{route('daftar-peserta')}}" class="btn-get-started scrollto">Daftar Peserta</a> -->
      </div>
    </section>
    <div class="position-absolute top-0 start-50 translate-middle-x">
      <div class="d-flex align-items-center">
        <img src="{{asset('img/top-banner-2026-3.jpeg')}}" style="height: 90vh;" />
      </div>
    </div>
    <!-- <img src="{{asset('img/top-banner-2026.png')}}" class="img-fluid" /> -->
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
            <a href="{{ asset('img/rute-8-2026-1.jpeg')}}" target="_blank">
              <img src="{{asset('/img/rute-8-2026-1.jpeg')}}" class="img-fluid" alt="">
            </a>
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <a href="{{ asset('img/rute-17-2026-1.jpeg')}}" target="_blank">
              <img src="{{asset('/img/rute-17-2026-1.jpeg')}}" class="img-fluid" alt="">
            </a>
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <a href="{{ asset('img/rute-45-2026-2.jpeg')}}" target="_blank">
              <img src="{{asset('/img/rute-45-2026-2.jpeg')}}" class="img-fluid" alt="">
            </a>
          </div>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Tentang Gerak Jalan Proklamasi Tahun 2026</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p class="fw-bold">A. Kategori Perlombaan</p>
            <p>Kategori perlombaan gerak jalan proklamasi Tahun 2026 dibagi menjadi 3 kategori diantaranya </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Kategori Putra jarak tempuh 17 KM</li>
              <li><i class="ri-check-double-line"></i> Kategori Putri jarak tempuh 8 KM</li>
              <li><i class="ri-check-double-line"></i> Kategori Putra jarak tempuh 45 KM</li>
            </ul>
            <p class="fw-bold">B. Kategori Peserta</p>
            <p>Kategori Peserta dibagi menjadi 4 diantaranya :</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Kategori 1 : TNI / POLRI / SATPOL PP / Damkar / Basarnas / Polsus /
                Security / KPLP / BNPB / Beacukai / Navigasi / Dishub <b>(Jarak 17 Km, 8 Km, 45 Km)</b></li>
              <li><i class="ri-check-double-line"></i> Kategori 2 : OPD / Instansi Vertikal / PKK / GOW / Darmawanita /
                BUMN / BUMD/ Guru <b>(Jarak 17 Km, 8 Km, 45 Km)</b></li>
              <li><i class="ri-check-double-line"></i> Kategori 3 : Umum / Ormas / Mahasiswa / RT / RW <b>(Jarak 17 Km, 8
                  Km, 45 Km)</b></li>
              <li><i class="ri-check-double-line"></i> Kategori 4 : Pelajar <b>(Jarak 17 Km, 8 Km)</b></li>
            </ul>
            <p class="fw-bold">C. Jadwal Pendaftaran Gerak Jalan Proklamasi Tahun 2026</p>
            <p>Pendaftaran Gerak Jalan Proklamasi Tahun 2026 dilaksanakan secara online yang akan dilakukan sebagai
              berikut:</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Tanggal : 08 Juli s/d 15 Agustus 2026</li>
            </ul>
            <p>Pendaftaran Gerak Jalan Proklamasi Tahun 2026 dilaksanakan secara online yang akan dilakukan sebagai
              berikut:</p>
            <div class="d-flex">
              <ul>
                <li><i class="ri-check-double-line"></i> Istagram : <a
                    href="https://www.instagram.com/dispora_tanjungpinang/" target="_blank">@dispora_tanjungpinang</a>
                </li>
                <li><i class="ri-check-double-line"></i> Group Whatsapp : melalui nomor WA (<a
                    href="https://wa.me/6281266097649" target="_blank">0812-6609-7649</a>; <a
                    href="https://wa.me/628122770400" target="_blank">0812-2770-400</a>)</li>
                <li><img src="{{asset('/img/group-wh-2026.jpeg')}}" class="img-fluid" alt="" style="width: 200px"></li>
              </ul>

            </div>
            <p class="fw-bold">D. Nomor Peserta</p>
            <p>Nomor peserta akan diberikan pada:</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Hari : Selasa s.d Jum`at</li>
              <li><i class="ri-check-double-line"></i> Tanggal : 14 s.d 21 Agustus 2026</li>
              <li><i class="ri-check-double-line"></i> Jam : 08.00 s.d 16.00</li>
              <li><i class="ri-check-double-line"></i> Tempat : Kantor KONI Tanjungpinang (Lapangan Pamedan)</li>
            </ul>
            <p>Setiap Regu akan diberikan nomor peserta, dengan ketentuan pemasangan yaitu:</p>
            <ul>
              <li><i class="ri-check-double-line"></i> 1 Nomor peserta dipasangkan pada barisan kanan paling depan; dan
              </li>
              <li><i class="ri-check-double-line"></i> 1 Nomor peserta dipasangkan pada barisan kiri paling belakang.</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p class="fw-bold">E. Pelaksanaan Gerak Jalan Proklamasi Tahun 2026</p>
            <ul>
              <li><i class="ri-check-double-line"></i> <b>1.
                  Gerak Jalan 17 Km</b></li>
              <li>
                <table>
                  <tr>
                    <td>Hari/Tanggal</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>Sabtu / 22 Agustus 2026</td>
                  </tr>
                  <tr>
                    <td>Jam</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>06.00 s.d Selesai</td>
                  </tr>
                  <tr>
                    <td>Tempat</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>Start → Terminal Sungai Carang, Bintan Center</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Finish → Belakang Panggung Pelataran Tugu Sirih</td>
                  </tr>
                </table>
              </li>
              <li><i class="ri-check-double-line"></i> <b>2. Gerak Jalan 8 Km</b></li>
              <li>
                <table>
                  <tr>
                    <td>Hari/Tanggal</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>Minggu / 23 Agustus 2026</td>
                  </tr>
                  <tr>
                    <td>Jam</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>06.00 s.d Selesai</td>
                  </tr>
                  <tr>
                    <td>Tempat</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>Start → Terminal Sungai Carang, Bintan Center</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Finish → Lapangan Pamedan Gerbang Kantor KONI</td>
                  </tr>
                </table>
              </li>
              <li><i class="ri-check-double-line"></i> <b>3. Gerak Jalan 45 Km</b></li>
              <li>
                <table>
                  <tr>
                    <td>Hari/Tanggal</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>Sabtu s.d Minggu / 29 s.d 30 Agustus 2026</td>
                  </tr>
                  <tr>
                    <td>Jam</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>20.00 s.d Selesai</td>
                  </tr>
                  <tr>
                    <td>Tempat</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>Start → Bundaran Tugu Monumen Provinsi, Dompak</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Finish → Belakang Panggung Pelataran Tugu Sirih</td>
                  </tr>
                </table>
              </li>
            </ul>
            <p class="fw-bold">F. Barisan</p>
            <p>Formasi barisan dalam perlombaan Gerak Jalan Proklamasi {{"Tahun " . $data?->tahun}} sebagai berikut :</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Berisikan 10 orang anggota barisan dan 1 orang komandan barisan
              </li>
              <li><i class="ri-check-double-line"></i> Bentuk formasi 2 berbanjar ke belakang dengan masing-masing barisan
                terdiri dari 5 orang</li>
              <li><i class="ri-check-double-line"></i> Komandan barisan berada disamping kanan barisan</li>
            </ul>
            <p class="fw-bold">G. Pakaian dan Kelengkapan</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Pakaian olahraga lengkap dengan sepatu serta kelengkapan lainnya
                yang memenuhi etika kesopanan, kepatutan dan tidak mengandung unsur sara</li>
              <li><i class="ri-check-double-line"></i> Diperbolehkan menggunakan pakaian kreasi tetapi tetap tidak
                melanggar etika kesopanan, kepatutan dan tidak mengandung unsur sara</li>
              <li><i class="ri-check-double-line"></i> Pakaian peserta yang melanggar etika kesopanan dan kepatutan tidak
                dizinkan untuk dilepas pada saat <span class="fst-italic">start</span></li>
              <li><i class="ri-check-double-line"></i> Jika masih terdapat dijalanan peserta yang menggunakan
                pakaian/seragam yang melanggar ketentuan maka peserta regu tersebut akan langsung di bubarkan oleh tim
                keamanan dan nomor peserta ditarik oleh panitia</li>
              <li><i class="ri-check-double-line"></i> Dilarang menggunakan pakaian dengan model menyerupai hantu</li>
            </ul>
            <p class="fw-bold">H. Lagu</p>
            <p>Lagu yang diperbolehkan untuk dinyanyikan adalah sebagai berikut:</p>
            <ul>
              <li><i class="ri-check-double-line"></i> Menyanyikan lagu-lagu wajib Nasional / Perjuangan</li>
              <li><i class="ri-check-double-line"></i> Menyanyikan lagu daerah</li>
              <li><i class="ri-check-double-line"></i> Menyanyikan lagu / Mars / yel-yel dari peserta yang sopan dan tidak
                mengandung unsur SARA</li>
              <li><i class="ri-check-double-line"></i> Hanya diperkenankan menggunakan alat bantu berupa pluit</li>
            </ul>
            <div class="d-flex justify-content-center p-2">
              <a href="{{asset('REGULASI.GERAK.JALAN.2026.pdf')}}" target="_blank"
                class="btn-learn-more position-relative">
                Download Pengumuman <span
                  class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">Baru!!<span
                    class="visually-hidden">Pengumuman Baru</span></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <section id="services" class="about our-values section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Pakta Integritas</h2>
          <p>Download dan isi Pakta Integritas sebagai lampiran untuk melakukan Pendaftaran Ulang sesuai jadwal yang telah
            ditentukan</p>
        </div>
        <div class="d-flex justify-content-center content">
          <a href="{{asset('FAKTA.INTEGRITAS.gerak.jalan.2026.ok.baru.pdf')}}" target="_blank"
            class="btn-learn-more position-relative">
            Download Pakta Integritas <span
              class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">Baru!!<span
                class="visually-hidden">Pengumuman Baru</span></span>
          </a>
        </div>
      </div>
    </section><!-- End Our Values Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="cta">
      <div class="container">
        <div class="section-title">
          @if(!$buka)
            @if($data?->tgl_buka > now())
              <h3>Pendaftaran Belum dibuka. <span class="text-danger">Bagi yang telah mencoba mendaftar</span> agar mendaftar
                kembali setelah pendaftaran dibuka</h3>
            @endif

            @if($data?->tgl_tutup < now())
              <h3>Pendaftaran telah ditutup. <span class="text-danger">Selamat berlomba dan Sampai jumpa tahun depan</h3>
            @endif
          @else
            <h3>Ayo Mendaftar</h3>
            <h3 class="text-bg-danger py-1"><i class="bi bi-flag"></i> Pendaftaran telah dibuka !!! <i
                class="bi bi-flag"></i></h3>
            <h5 class="text-light">Bagi yang telah mencoba mendaftar <span class="text-danger">sebelum pendaftaran
                dibuka</span> agar dapat mendaftar kembali</h5>
          @endif
        </div>
        @if($katLomba && $buka)
          <p>Pilih kategori sesuai dengan data kepesertaan anda</p>
          <div class="row">
            @foreach($katLomba as $item)
              @if($item->id == 22)
                <div class="col-lg-4 col-md-12 mb-4">
                  <a href="{{route('form-pendaftaran-peserta', ['id_lomba' => $item->id])}}">
                    <div class="icon-box card card-body text-center">

                      <div class="icon"><i class="bi bi-star-half" style="color: #ff689b;"></i></div>
                      <h4 class="title">{{$item->judul}}</h4>
                      <p class="description">{{$item->ket}}</p>

                    </div>
                  </a>
                </div>
              @endif
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
            <img src="{{asset('/img/logo-tpi.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/logo-dispora.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/logo-kormi.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col d-flex align-items-center justify-content-center">
            <img src="{{asset('/img/ppi.png')}}" class="img-fluid" alt="">
          </div>
          <!-- <div class="col d-flex align-items-center justify-content-center">
                                                                                                                                                                                                        <img src="{{asset('/img/ppi.png')}}" class="img-fluid" alt="">
                                                                                                                                                                                                      </div> -->
          <!-- <div class="col d-flex align-items-center justify-content-center">
                                                                                                                                                                                                        <img src="{{asset('/img/logo-igornas.png')}}" class="img-fluid" alt="">
                                                                                                                                                                                                      </div> -->
          <!-- <div class="col d-flex align-items-center justify-content-center">
                                                                                                                                                                                                        <img src="{{asset('/img/koni.svg')}}" class="img-fluid" alt="">
                                                                                                                                                                                                      </div> -->
          <!-- <div class="col d-flex align-items-center justify-content-center">
                                                                                                                                                                                                        <img src="{{asset('/img/logo-hut-ri-79.png')}}" class="img-fluid" alt="">
                                                                                                                                                                                                      </div> -->
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