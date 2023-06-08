@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg posts-list">
             <div class="single-post">
               @foreach ( $struktur as $p)
               <div style="text-align: center">
                  {!! $p->konten!!}
                 </div>
                <div class="feature-img" style="text-align: center">
                   <img class="img-fluid" src="{{ asset('storage/'.$p->gambar) }}" alt="">
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