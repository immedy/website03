@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Visi Misi Motto dan Nilai Nilai</h3>                    
                </div>
            </div>
        </div>
    </div>
</div>
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg posts-list">
                    <div class="single-post">
                        @foreach ($visimisi as $p)
                            <div class="feature-img" style="text-align: center">
                                <img class="img-fluid" style="text-align: center" src="{{ asset('storage/' . $p->gambar) }}"
                                    alt="">
                            </div>
                            <div class="blog_details">                                
                                <div style="text-align: justify">
                                    {!! $p->konten !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="navigation-top">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
