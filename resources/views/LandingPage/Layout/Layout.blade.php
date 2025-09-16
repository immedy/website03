<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dayaku Raja</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="facebook-domain-verification" content="fcmc82c63y07wjuanf3bcr1fk45821" />

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("LandingPage/img/daraico.ico") }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset("LandingPage/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/magnific-popup.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/font-awesome.min.css") }}"> 
    <link rel="stylesheet" href="{{ asset("LandingPage/css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/nice-select.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/flaticon.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/gijgo.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/animate.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/slicknav.css") }}">
    <link rel="stylesheet" href="{{ asset("LandingPage/css/style.css") }}">
    <link rel="stylesheet" href="{{ asset('LandingPage/css/responsive.css') }}">
</head>
<body>
    @include('sweetalert::alert')
     <!-- header-start -->
     <header>
        <div class="header-area ">
            <div class="header-top_area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">                                
                                <a href="https://www.facebook.com/rsdayakurajakotabangun?mibextid=ZbWKwL" target="_blank">
                                    <i class="fa fa-facebook">Facebook</i>
                                </a>
                                <a href="https://www.instagram.com/rsdayakuraja?igsh=aGZlbGE4YmJyd242" target="_blank">
                                    <i class="fa fa-instagram"> Instagram</i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-hospital-o"></i> IGD : - </a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i>Informasi : 0813-4730-2554</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset("LandingPage/img/logodara.png") }}"  height="67px">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="{{ Request::is('/')?'active' : '' }}" href="/">Home</a></li>
                                        <li><a href="#" class="{{ Request::is('profil/*')?'active' : '' }}">Profil<i class="ti-angle-down "></i></a>
                                            <ul class="submenu">
                                                <li><a href="/profil/visimisimottonilai" >Visi Misi Dan Nilai</a></li>
                                                <li><a href="/profil/sejarah">Sejarah</a></li>
                                                <li><a href="/profil/strukturorganisasi">Strukrur Organisasi</a></li>
                                                <li><a href="/Kesalahan">Prestasi</a></li>
                                                <li><a href="/profil/direktur">Direktur</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="{{ Request::is('informasi/*')?'active' : '' }}">Informasi<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="/informasi/berita">Berita</a></li>
                                                <li><a href="/informasi/galery">Galeri</a></li>
                                                <li><a href="/Kesalahan">Capaian Indikator</a></li>
                                                <li><a href="/Kesalahan">Tata Tertib Pengunjung</a></li>                                                
                                            </ul>
                                        </li>
                                        <li><a href="#" class="{{ Request::is('Instalasi/*')?'active' : '' }}">layanan Medis<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">  
                                                <li><a href="/Instalasi/GawatDarurat/">Instalasi Gawat Darurat</a></li> 
                                                <li><a href="/Instalasi/RawatInap">Instalasi Rawat Inap</a></li> 
                                                <li><a href="/Instalasi/Rawatjalan">Instalasi Rawat Jalan</a></li> 
                                                <li><a href="/Instalasi/Laboratorium">Instalasi Laboratorium</a></li> 
                                                <li><a href="/Instalasi/Radiologi">Instalasi Radiologi</a></li> 
                                                <li><a href="/Instalasi/BedahSentral">Instalasi Bedah Central</a></li>
                                                <li><a href="/Instalasi/CareUnit">Instalasi Care Unit</a></li>
                                                <li><a href="/Instalasi/Farmasi">Instalasi Farmasi</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/JadwalDokter">Jadwal Dokter</a></li>
                                        <li><a href="https://ppid.dayakuraja.id/" target="_blank">PPID</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    
    
    @yield('KONTEN')
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end  -->
    <!-- link that opens popup -->

    <!-- JS here -->
    <script src="{{ asset("LandingPage/js/vendor/modernizr-3.5.0.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/vendor/jquery-1.12.4.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/popper.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/owl.carousel.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/isotope.pkgd.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/ajax-form.js") }}"></script>
    <script src="{{ asset("LandingPage/js/waypoints.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.counterup.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/imagesloaded.pkgd.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/scrollIt.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.scrollUp.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/wow.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/nice-select.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.slicknav.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.magnific-popup.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/plugins.js") }}"></script>
    <script src="{{ asset("LandingPage/js/gijgo.min.js") }}"></script>
    <!--contact js-->
    <script src="{{ asset("LandingPage/js/contact.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.ajaxchimp.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.form.js") }}"></script>
    <script src="{{ asset("LandingPage/js/jquery.validate.min.js") }}"></script>
    <script src="{{ asset("LandingPage/js/mail-script.js") }}"></script>

    <script src="{{ asset("LandingPage/js/main.js") }}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    </script>
</body>
</html>