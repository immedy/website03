@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<section class="blog_area single-post-area section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg posts-list">
             <div class="single-post">
               @foreach ( $visimisi as $p)
                <div class="feature-img" style="text-align: center">
                   <img class="img-fluid" style="text-align: center" src="{{ asset('storage/'.$p->gambar) }}" alt="">
                </div>
                <div class="blog_details">
                  <h1> {{ $p->judul }}</h1>                                      
                   <ul class="blog-info-link mt-3 mb-4">
                      <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                      <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                   </ul>
                   <div style="text-align: justify"  >
                  {!!  $p->konten !!}
                  </div>
                </div>
                @endforeach
             </div>
             <div class="navigation-top">
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

