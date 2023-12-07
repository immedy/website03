@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg posts-list">
             <div class="single-post">
               @foreach ( $sejarah as $p)
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset('storage/'.$p->gambar) }}" alt="">
                </div>
                <div class="blog_details mt-0">
                  <h1> {{ $p->judul }}</h1>                                       
                   <ul class="blog-info-link">
                      <li><a href="#"><i class="fa fa-user"></i> admiin</a></li>
                   </ul>
                   <div style="text-align: justify">
                   {!! $p->konten!!}
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