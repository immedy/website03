@extends('LandingPage.Layout.Layout')
@section('KONTEN')
 <!-- slider_area_start -->
 <div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center" style="background-image: url({{asset('LandingPage/img/banner/web.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        
                    </div>
                </div>
            </div>
        </div>
        @foreach ($carosel as $p )
        <div class="single_slider d-flex align-items-center " style="background-image: url({{asset('storage/'. $p->carusel)}})">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider_text ">                            
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
               
    </div>
</div>
<!-- slider_area_end -->
    <!-- welcome_docmed_area_start -->
    <div class="welcome_docmed_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="{{ asset('LandingPage/img/about/2.jpg') }}" alt="">
                        </div>
                        <div class="thumb_2">
                            <img src="{{ asset('LandingPage/img/about/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Selamat Datang di Dayaku Raja</h2>
                        <p style="text-align: justify">Rumah Sakit Umum Daerah Dayaku Raja Kabupaten Kutai Kartanegara
                            merupakan Rumah Sakit milik Pemerintah Kabupaten Kutai Kartanegara Provinsi Kalimantan Timur,
                            RSUD Dayaku Raja yang merupakan RSUD ke 3 milik Pemkab Kukar setelah RSUD AM Parikesit di
                            Tenggarong dan RSUD Batara Agung Dewa Sakti di Kecamatan Samboja, RSUD Dayaku Raja diresmikan
                            pada tanggal 13 Maret 2013 dan berdasarkan Surat Keputusan Bupati Kutai Kartanegara Nomor
                            37/SK-BUP/HK/2017 tanggal 17 Februari 2017 ditetapkan sebagai BLUD–RSUD dengan status penuh.
                            Sejak Agustus 2016 melalui perjanjian kerjasama, RSUD Dayaku Raja bekerjasama </p>
                        <a href="/profil/sejarah" class="boxed-btn3-white-2">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->
    <!-- service_area_start -->
    <div class="service_area">
        <div class="container p-0">
            <div class="row no-gutters">
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i >
                            <img src="{{asset('LandingPage/icon/hospital-bed.png')}}" alt="">
                            </i>
                        </div>
                        <h3>Tempat Tidur</h3>                        
                        <a href="#" class="boxed-btn3-white">Lihat</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                            <i>                            
                            <img src="{{asset('LandingPage/icon/pharmacy.png')}}" alt="">
                            </i>
                        </div>
                        <h3>Instalasi Rawat Jalan</h3>                    
                        <a  class="boxed-btn3-white">Senin - Jumat</a>
                        <a  class="boxed-btn3-white">08:00 - 14:00</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_service">
                        <div class="icon">
                        <i>                            
                            <img src="{{asset('LandingPage/icon/suggestion.png')}}" alt="">
                            </i>
                        </div>
                        <h3>Kritik Dan Saran</h3>
                        <a href="{{ route('KritikSaran') }}" class="boxed-btn3-white">Klik Disini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- service_area_end -->
    <div class="our_department_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Berita Seputar Rumah Sakit Dayaku Raja</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($berita as $p)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department">
                            <div class="department_thumb">
                                <img src="{{ asset('storage/' . $p->gambar) }}" alt="">

                            </div>
                            <div class="department_content">
                                <a href="/informasi/berita/{{ $p->slug }}" target="_blank"><h2>{{ $p->judul }}</h2></a>
                                
                                <p>{{ $p->expert }}</p>
                                <p>
                                    <small class="me-3"><i class=""><span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
                                                </svg>
                                            </span></i>{{ $p->created_at->diffForHumans() }}</small>
                                </p>
                                <a href="/informasi/berita/{{ $p->slug }}" target="_blank" class="learn_more">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="doctors_title mb-55">
                        <h3>Dokter</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="expert_active owl-carousel">
                        @foreach ($dokter as $p)
                        <div class="single_expert">
                            <div class="expert_thumb">
                                <img src="{{asset('storage/' . $p->gambar) }}" alt="">
                            </div>
                            <div class="experts_name text-center">
                                <h3>{{ $p->nama }}</h3>
                                <span>{{ $p->referensi->deskripsi }}</span>
                            </div>
                        </div>                            
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
