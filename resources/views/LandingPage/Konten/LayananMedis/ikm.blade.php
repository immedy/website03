@extends('LandingPage.Layout.Layout')
@section('KONTEN')
<div class="bradcam_area breadcam_bg_2 bradcam_overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Index Kepuasan Masyarakat (IKM)</h3>
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
                        <h2>Daftar Dokumen</h2>
                        <p class="excert">
                            Berikut dokumen hasil survei kepuasan masyarakat yang dapat diunduh.
                        </p>

                        <form action="{{ route('ikm') }}" method="GET" class="mb-4">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-9">
                                    <input
                                        type="text"
                                        name="q"
                                        value="{{ $search ?? '' }}"
                                        class="form-control"
                                        placeholder="Cari berdasarkan nama dokumen..."
                                        aria-label="Cari dokumen IKM"
                                    >
                                </div>
                                <div class="col-md-3 d-flex gap-2">
                                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                                    @if (!empty($search))
                                        <a href="{{ route('ikm') }}" class="btn btn-light w-100">Reset</a>
                                    @endif
                                </div>
                            </div>
                        </form>

                        <ul class="nav nav-tabs mb-3" id="ikmTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="internal-tab" data-toggle="tab" data-bs-toggle="tab" href="#internal" role="tab"
                                    aria-controls="internal" aria-selected="true">
                                    Internal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="external-tab" data-toggle="tab" data-bs-toggle="tab" href="#external" role="tab"
                                    aria-controls="external" aria-selected="false">
                                    External
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="ikmTabContent">
                            <div class="tab-pane fade show active" id="internal" role="tabpanel" aria-labelledby="internal-tab">
                                <div class="table-responsive ikm_table_wrap">
                                    <table class="table ikm_table">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">No</th>
                                                <th>Nama Dokumen</th>
                                                <th style="width: 160px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($internalDocuments as $doc)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $doc->deskripsi }}</td>
                                                    <td>
                                                        <a href="{{ $doc->link_dokumen }}" class="btn btn-sm btn-primary"
                                                            target="_blank" rel="noopener noreferrer">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted py-4">
                                                        @if (!empty($search))
                                                            Dokumen internal dengan nama tersebut tidak ditemukan.
                                                        @else
                                                            Belum ada dokumen IKM internal.
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="external" role="tabpanel" aria-labelledby="external-tab">
                                <div class="table-responsive ikm_table_wrap">
                                    <table class="table ikm_table">
                                        <thead>
                                            <tr>
                                                <th style="width: 70px;">No</th>
                                                <th>Nama Dokumen</th>
                                                <th style="width: 160px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($externalDocuments as $doc)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $doc->deskripsi }}</td>
                                                    <td>
                                                        <a href="{{ $doc->link_dokumen }}" class="btn btn-sm btn-primary"
                                                            target="_blank" rel="noopener noreferrer">
                                                            Lihat
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="text-center text-muted py-4">
                                                        @if (!empty($search))
                                                            Dokumen external dengan nama tersebut tidak ditemukan.
                                                        @else
                                                            Belum ada dokumen IKM external.
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
