@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Penanganan Pengaduan Masyarakat</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h2>Penanganan Pengaduan Masyarakat</h2>
                        <div class="row">
                            @forelse ($penangananPengaduan as $item)
                                <div class="col-12 mb-4">
                                    <div class="border rounded p-3 h-100">
                                        <div class="mb-3 text-center">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Dokumentasi Penanganan"
                                                class="img-fluid rounded shadow-sm">
                                        </div>
                                        <p class="mb-0">{{ $item->deskripsi }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center text-muted py-4">
                                    Belum ada data penanganan pengaduan.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
