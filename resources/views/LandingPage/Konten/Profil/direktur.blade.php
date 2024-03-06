@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Direktur</h3>
                    <p><a href="index.html">Dari Masa Ke Masa</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="expert_doctors_area doctor_page">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="single_expert mb-40">
                    <div class="expert_thumb">
                        <img src="{{asset('LandingPage/img/experts/1.png')}}" alt="">
                    </div>
                    <div class="experts_name text-center">
                        <h3>dr. Aulia Rahman Basri</h3>
                        <span>Periode Maret 2013 - Juli 2019</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="single_expert mb-40">
                    <div class="expert_thumb">
                        <img src="{{asset('/LandingPage/img/experts/2.png')}}" alt="">
                    </div>
                    <div class="experts_name text-center">
                        <h3>dr. Aji Yulia Rahman</h3>
                        <span>Periode Juli 2019 - Oktober 2023</span>
                    </div>
                </div>
            </div>                   
        </div>
    </div>
</div>
@endsection