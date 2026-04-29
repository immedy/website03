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
            @foreach ($direktur as $p )
                <div class="col-md-6 col-lg-3">
                <div class="single_expert mb-40">
                    <div class="expert_thumb">
                        <img src="{{ asset('storage/'.$p->foto_direktur) }}" alt="">
                    </div>
                    <div class="experts_name text-center">
                        <h3>{{$p->nama_lengkap}}</h3>
                        <span>Periode {{$p->getFormatPeriodeAwalAttribute()}} - {{$p->getFormatPeriodeAkhirAttribute() ?? 'Sekarang'}}</span>
                    </div>
                </div>
            </div>
            @endforeach
                         
        </div>
    </div>
</div>
@endsection