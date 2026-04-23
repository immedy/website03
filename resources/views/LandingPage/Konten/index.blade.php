@extends('LandingPage.Layout.Layout')
@section('KONTEN')
@php
        $neuroServices = [
        [
            'icon' => 'LandingPage/icon/SPAN_LAPOR.png',
            'title' => 'SP4N LAPOR',
            'href' => 'https://sp4n.lapor.go.id/',
            'target' => '_blank',
        ],
        [
            'icon' => 'LandingPage/icon/ikm.png',
            'title' => 'Index Kepuasan Masyarakat (IKM)',
            'href' => route('ikm'),
            'target' => null,
        ],
        [
            'icon' => 'LandingPage/icon/PPID_RS.png',
            'title' => 'PPID RSUD Dayaku Raja',  
            'href' => 'https://ppid.dayakuraja.id/',
            'target' => '_blank',
        ],
        [
            'icon' => 'LandingPage/icon/FAQ.png',
            'title' => 'Frequently Asked Questions (FAQ)',
            'href' => route('faq'),
            'target' => null,
        ],
        [
            'icon' => 'LandingPage/icon/maklumat.png',
            'title' => 'Standar Pelayanan',
            'href' => null,
            'target' => null,
        ],
        [
            'icon' => 'LandingPage/icon/hospital-bed.png',
            'title' => 'Tempat Tidur',
            'href' => 'https://registration.rsdara.kesia.id/bm',
            'target' => '_blank',
        ],
        [
            'icon' => 'LandingPage/icon/suggestion.png',
            'title' => 'Kritik/Saran/Pengaduan',
            'href' => 'https://linktr.ee/informasi.rsudayakuraja22',
            'target' => '_blank',
        ],
        [
            'icon' => 'LandingPage/icon/pharmacy.png',
            'title' => 'Jadwal Poliklinik',
            'href' => route('JadwalDokter'),
            'target' => null,
        ]
    ];
@endphp
 <!-- slider_area_start -->
 <div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider d-flex align-items-center" style="background-image: url('{{ asset('LandingPage/img/banner/web.jpg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        
                    </div>
                </div>
            </div>
        </div>
        @foreach ($carosel as $p)
        <div class="single_slider d-flex align-items-center" style="background-image: url('{{ asset('storage/' . $p->carusel) }}')">
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
                            <img src="{{ asset('LandingPage/img/about/2.jpg') }}" alt="Tentang RSUD Dayaku Raja" loading="lazy" decoding="async">
                        </div>
                        <div class="thumb_2">
                            <img src="{{ asset('LandingPage/img/about/1.jpg') }}" alt="Fasilitas RSUD Dayaku Raja" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h2>Selamat Datang di Dayaku Raja</h2>
                        <h5>Maklumat Pelayanan</h5>
                        <p class="text-justify">
                            Kami siap memberikan pelayanan sesuai dengan standar pelayanan, melakukan perbaikan secara berkala, dan apabila kami
                            tidak memberikan pelayanan sesuai dengan standar yang telah ditetapkan, kami siap menerima sanksi sesuai dengan
                            peraturan perundang-undangan.
                            <br><br>
                            Direktur RSUD Dayaku Raja
                            <br>
                            Kabupaten Kutai Kartanegara
                            <br>
                            <br>
                            <br>
                            Ns. Ipandi Lukman, S.Kep., MM
                        </p>
                        <a href="/profil/sejarah" class="boxed-btn3-white-2">Baca Selengkapnya Sejarah Rumah Sakit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_docmed_area_end -->
    <!-- Aplikasi Terkait_pelayana -->
    <div class="our_department_area services_overview_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="neuro_services_active owl-carousel">
                        @foreach ($neuroServices as $service)
                            @if (!empty($service['href']))
                                <a
                                    href="{{ $service['href'] }}"
                                    class="single_department services_overview_card services_overview_link"
                                    @if (!empty($service['target'])) target="{{ $service['target'] }}" rel="noopener noreferrer" @endif
                                >
                            @else
                                <div class="single_department services_overview_card">
                            @endif
                                <div class="department_thumb services_overview_iconwrap">
                                    <img
                                        src="{{ asset($service['icon']) }}"
                                        alt="{{ $service['title'] }} icon"
                                        class="services_overview_icon"
                                        loading="lazy"
                                        decoding="async"
                                    >
                                </div>
                                <div class="department_content">
                                    <h3>{{ $service['title'] }}</h3>
                                </div>
                            @if (!empty($service['href']))
                                </a>
                            @else
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Aplikasi Terkait_pelayana -->

    <div class="our_department_area news_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-55">
                        <h3>Berita Seputar Rumah Sakit Dayaku Raja</h3>
                    </div>
                </div>
            </div>
            <div class="row align-items-stretch">
                @forelse ($berita as $p)
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_department news_card h-100 d-flex flex-column">
                            <div class="department_thumb news_thumb">
                                <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->judul }}" class="news_thumb_img" loading="lazy" decoding="async">
                            </div>
                            <div class="department_content news_content d-flex flex-column flex-grow-1">
                                <h3 class="news_title">
                                    <a href="/informasi/berita/{{ $p->slug }}" target="_blank" rel="noopener noreferrer">{{ $p->judul }}</a>
                                </h3>
                                <p class="news_excerpt">{{ $p->expert }}</p>
                                <div class="news_footer mt-auto">
                                    <p class="news_meta">
                                        <small class="me-3"><i class=""><span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z" />
                                                    </svg>
                                                </span></i>{{ $p->created_at->diffForHumans() }}</small>
                                    </p>
                                    <a href="/informasi/berita/{{ $p->slug }}" target="_blank" rel="noopener noreferrer" class="learn_more">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="text-center empty_state">
                            <p>Belum ada berita terbaru.</p>
                        </div>
                    </div>
                @endforelse
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
                        @forelse ($dokter as $p)
                            <div class="single_expert">
                                <div class="expert_thumb">
                                    <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama }}" loading="lazy" decoding="async">
                                </div>
                                <div class="experts_name text-center">
                                    <h3>{{ $p->nama }}</h3>
                                    <span>{{ $p->referensi->deskripsi }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="single_expert">
                                <div class="experts_name text-center empty_state">
                                    <h3>Dokter</h3>
                                    <span>Data dokter belum tersedia.</span>
                                </div>
                            </div>
                        @endforelse
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
