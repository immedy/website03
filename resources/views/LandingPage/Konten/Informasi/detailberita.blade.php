@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 posts-list">
             <div class="single-post">
                <div class="feature-img">
                   <img class="img-fluid" src="{{ asset('storage/' . $detailberita->gambar) }}" alt="">
                </div>
                <div class="blog_details">
                   <h2>{{ $detailberita->judul }}
                   </h2>
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                      <li><a href="#"><i class="fa fa-time"></i> {{ $detailberita->created_at->diffForHumans() }}</a></li>
                   </ul>
                   <p class="excert">
                      {!! $detailberita->kontent !!}
                   </p>
                </div>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="blog_right_sidebar">
                <aside class="single_sidebar_widget search_widget">
                   <form action="#">
                      <div class="form-group">
                         <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder='Search Keyword'
                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                            <div class="input-group-append">
                               <button class="btn" type="button"><i class="ti-search"></i></button>
                            </div>
                         </div>
                      </div>
                      <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                         type="submit">Search</button>
                   </form>
                </aside>
                <aside class="single_sidebar_widget post_category_widget">
                   <h4 class="widget_title">Category</h4>
                   <ul class="list cat-list">
                      <li>
                         <a href="#" class="d-flex">
                            <p>Resaurant food</p>
                            <p>(37)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Travel news</p>
                            <p>(10)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Modern technology</p>
                            <p>(03)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Product</p>
                            <p>(11)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Inspiration</p>
                            <p>(21)</p>
                         </a>
                      </li>
                      <li>
                         <a href="#" class="d-flex">
                            <p>Health Care</p>
                            <p>(21)</p>
                         </a>
                      </li>
                   </ul>
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                   <h3 class="widget_title">Recent Post</h3>
                   <div class="media post_item">
                      <img src="img/post/post_1.png" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>From life was you fish...</h3>
                         </a>
                         <p>January 12, 2019</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="img/post/post_2.png" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>The Amazing Hubble</h3>
                         </a>
                         <p>02 Hours ago</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="img/post/post_3.png" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>Astronomy Or Astrology</h3>
                         </a>
                         <p>03 Hours ago</p>
                      </div>
                   </div>
                   <div class="media post_item">
                      <img src="img/post/post_4.png" alt="post">
                      <div class="media-body">
                         <a href="single-blog.html">
                            <h3>Asteroids telescope</h3>
                         </a>
                         <p>01 Hours ago</p>
                      </div>
                   </div>
                </aside>
             </div>
          </div>
       </div>
    </div>
 </section>
@endsection