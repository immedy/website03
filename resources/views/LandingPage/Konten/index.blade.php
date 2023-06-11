@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<!-- testmonial_area_start -->

<!-- testmonial_area_end -->

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
                    <p style="text-align: justify">Rumah Sakit Umum Daerah Dayaku Raja Kabupaten Kutai Kartanegara merupakan Rumah Sakit milik Pemerintah Kabupaten Kutai Kartanegara Provinsi Kalimantan Timur, RSUD Dayaku Raja yang merupakan RSUD ke 3 milik Pemkab Kukar setelah RSUD AM Parikesit di Tenggarong dan RSUD Batara Agung Dewa Sakti di Kecamatan Samboja, RSUD Dayaku Raja diresmikan pada tanggal 13 Maret 2013 dan berdasarkan Surat Keputusan Bupati Kutai Kartanegara Nomor 37/SK-BUP/HK/2017 tanggal 17 Februari 2017 ditetapkan sebagai BLUD–RSUD dengan status penuh.
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
                        <i class="flaticon-electrocardiogram"></i>
                    </div>
                    <h3>Hospitality</h3>
                    <p>Clinical excellence must be the priority for any health care service provider.</p>
                    <a href="#" class="boxed-btn3-white">Apply For a Bed</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-emergency-call"></i>
                    </div>
                    <h3>Emergency Care</h3>
                    <p>Clinical excellence must be the priority for any health care service provider.</p>
                    <a href="#" class="boxed-btn3-white">+10 672 356 3567</a>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service">
                    <div class="icon">
                        <i class="flaticon-first-aid-kit"></i>
                    </div>
                    <h3>Chamber Service</h3>
                    <p>Clinical excellence must be the priority for any health care service provider.</p>
                    <a href="#" class="boxed-btn3-white">Make an Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service_area_end -->

    
@endsection