@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Frequently Asked Questions (FAQ)</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog_area single-post-area section-padding faq_area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 posts-list">
                <div class="single-post">
                    <div class="blog_details">
                        <h2>Daftar Pertanyaan</h2>
                        <p class="excert">
                            Berikut beberapa pertanyaan yang sering ditanyakan. Klik pertanyaan untuk melihat jawabannya.
                        </p>

                        <div id="faqAccordion" class="accordion">
                            @forelse ($faqs as $idx => $item)
                                @php
                                    $headingId = 'faqHeading' . $idx;
                                    $collapseId = 'faqCollapse' . $idx;
                                    $isFirst = $idx === 0;
                                @endphp
                                <div class="card mb-2">
                                    <div class="card-header" id="{{ $headingId }}">
                                        <h5 class="mb-0">
                                            <button
                                                class="btn btn-link p-0 text-left w-100 faq_question d-flex align-items-center justify-content-between"
                                                type="button"
                                                data-toggle="collapse"
                                                data-target="#{{ $collapseId }}"
                                                aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                                aria-controls="{{ $collapseId }}"
                                            >
                                                <span class="faq_question_text">{{ $item->pertanyaan }}</span>
                                                <span class="ti-angle-down faq_toggle" aria-hidden="true"></span>
                                            </button>
                                        </h5>
                                    </div>

                                    <div
                                        id="{{ $collapseId }}"
                                        class="collapse @if($isFirst) show @endif"
                                        aria-labelledby="{{ $headingId }}"
                                        data-parent="#faqAccordion"
                                    >
                                        <div class="card-body">
                                            {!! ($item->jawaban) !!}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="card mb-2">
                                    <div class="card-body text-center text-muted">
                                        Belum ada data FAQ.
                                    </div>
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
