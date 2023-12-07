@extends('LandingPage.Layout.Layout')
@section('KONTEN')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg posts-list">
                    <div class="single-post">
                        @foreach ($berita as $p)
                            <div class="feature-img" style="text-align: center">
                                <img class="img-fluid" style="text-align: center" src="{{ asset('storage/' . $p->gambar) }}"
                                    alt="">
                            </div>
                            <div class="blog_details">
                              <a href="/informasi/berita/{{ $p->slug }}">
                                 <h1>{{ $p->judul }}</h1>
                              </a>                                
                                <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i>{{ $p->user_id }} Ragil M. Rivandi</a>
                                    </li>
                                    <li><a href="#"><i
                                                class="fa fa-comments"></i>{{ $p->created_at->diffForHumans() }}</a></li>
                                </ul>
                                <div style="text-align: justify">
                                    {{ $p->expert }}
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
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tulis Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Cari berita</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
