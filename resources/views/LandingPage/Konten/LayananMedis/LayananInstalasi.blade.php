@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            @foreach ($unit as $p )
               
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset('storage/' .$p->gambar) }}" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $p->JenisRuangan->ruangan }}
                        </h2>                        
                        <p class="excert">
                            {!! $p->konten !!}
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            @endforeach
        </div>
    </div>
</section>
@endsection