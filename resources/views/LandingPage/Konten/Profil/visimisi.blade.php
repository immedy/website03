@extends('LandingPage.Layout.Layout')
@section('KONTEN')
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
                                <h1> {{ $p->judul }}</h1>
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
