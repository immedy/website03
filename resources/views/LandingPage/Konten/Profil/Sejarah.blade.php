@extends('LandingPage.Layout.Layout')
@section('KONTEN')
@foreach ( $sejarah as $p)
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
   <div class="container">
       <div class="row">
           <div class="col-xl-12">
               <div class="bradcam_text">
                   <h3>{{ $p->judul }}</h3>                    
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
               
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset('storage/'.$p->gambar) }}" alt="">
                </div>
                <div class="blog_details mt-0">
                  <h1> </h1>                                       
                   <ul class="blog-info-link">
                      <li><a href="#"><i class="fa fa-user"></i> admiin</a></li>
                   </ul>
                   <div style="text-align: justify">
                   {!! $p->konten!!}
                  </div>
                </div>
                
             </div>
             <div class="navigation-top">
             </div>
          </div>
       </div>
    </div>
</section>
@endforeach
@endsection