@extends('LandingPage.Layout.Layout')
@section('KONTEN')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg posts-list">
                    <div class="single-post">
                        <h2>{{ $detailberita->judul }}
                        </h2>
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('storage/' . $detailberita->gambar) }}" alt="">
                        </div>
                        <div class="blog_details">            
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="fa fa-user"></i> Oleh Admin</a></li>
                                <li><a href="#"><i class="fa fa-time"></i>
                                        {{ $detailberita->created_at->diffForHumans() }}</a></li>
                            </ul>
                            <p class="excert">
                                {!! $detailberita->kontent !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
