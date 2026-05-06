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

                            <li class="nav-item">
                                <a class="nav-link" id="survei-ikm-tab" data-toggle="tab" data-bs-toggle="tab" href="#survei-ikm" role="tab"
                                    aria-controls="survei-ikm" aria-selected="false">
                                    Survey IKM
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

                            <div class="tab-pane fade" id="survei-ikm" role="tabpanel" aria-labelledby="survei-ikm-tab">
                                @if ($surveiDocuments->count())
                                    <div class="row g-4">
                                        @foreach ($surveiDocuments as $doc)
                                            <div class="col-md-6 col-lg-4">
                                                <div
                                                    class="card h-100 border-0 shadow-sm survei-ikm-card js-open-survei-preview"
                                                    role="button"
                                                    tabindex="0"
                                                    data-title="{{ $doc->deskripsi }}"
                                                    data-link="{{ $doc->dokumen_url }}"
                                                >
                                                    <div class="survei-ikm-thumb-link">
                                                        <div class="survei-ikm-thumb survei-ikm-thumb--pdf d-flex flex-column align-items-center justify-content-center text-center px-4">
                                                            <span class="survei-ikm-thumb-icon">QR</span>
                                                            <span class="survei-ikm-thumb-text">Klik untuk mengisi survei</span>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <h6 class="card-title mb-0">{{ $doc->deskripsi }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center text-muted py-4 bg-light rounded">
                                        @if (!empty($search))
                                            Dokumen survei dengan nama tersebut tidak ditemukan.
                                        @else
                                            Belum ada dokumen survei IKM.
                                        @endif
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="survei-preview-overlay" id="surveiPreviewOverlay"></div>
<div class="survei-preview-drawer" id="surveiPreviewDrawer" aria-hidden="true">
    <div class="survei-preview-header">
        <div>
            <span class="survei-preview-label">Preview Gambar</span>
            <h4 class="survei-preview-title" id="surveiPreviewTitle">Preview Survei IKM</h4>
        </div>
        <button type="button" class="survei-preview-close" id="surveiPreviewClose" aria-label="Tutup preview">
            <span>&times;</span>
        </button>
    </div>
    <div class="survei-preview-body">
        <div class="survei-preview-frame-wrap">
            <iframe src="" id="surveiPreviewFrame" class="survei-preview-frame" title="Preview Survei IKM"></iframe>
        </div>
        <p class="survei-preview-description" id="surveiPreviewDescription"></p>
    </div>
    <div class="survei-preview-footer">
        <a href="#" id="surveiPreviewLink" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-sm">
            Buka Dokumen
        </a>
        <button type="button" class="btn btn-light btn-sm" id="surveiPreviewCloseButton">Tutup</button>
    </div>
</div>

<style>
    .survei-ikm-card {
        overflow: hidden;
        border-radius: 16px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: pointer;
    }

    .survei-ikm-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.08) !important;
    }

    .survei-ikm-thumb-link {
        display: block;
        background: #f8f9fa;
    }

    .survei-ikm-thumb {
        width: 100%;
        height: 360px;
        padding: 16px;
        border-bottom: 1px solid #eef1f4;
    }

    .survei-ikm-thumb--pdf {
        background: linear-gradient(180deg, #eff6ff 0%, #dbeafe 100%);
        color: #1e3a8a;
    }

    .survei-ikm-thumb-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.9);
        color: #2563eb;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        margin-bottom: 20px;
    }

    .survei-ikm-thumb-icon {
        width: 88px;
        height: 88px;
        border-radius: 24px;
        background: rgba(255, 255, 255, 0.75);
        color: #1d4ed8;
        font-size: 28px;
        font-weight: 800;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
        box-shadow: inset 0 0 0 1px rgba(37, 99, 235, 0.12);
    }

    .survei-ikm-thumb-text {
        max-width: 220px;
        font-size: 14px;
        line-height: 1.6;
        font-weight: 600;
    }

    .survei-preview-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(4px);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.25s ease, visibility 0.25s ease;
        z-index: 1040;
    }

    .survei-preview-overlay.is-open {
        opacity: 1;
        visibility: visible;
    }

    .survei-preview-drawer {
        position: fixed;
        top: 16px;
        right: 16px;
        bottom: 16px;
        width: min(640px, calc(100vw - 32px));
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 24px 80px rgba(15, 23, 42, 0.2);
        transform: translateX(calc(100% + 32px));
        transition: transform 0.35s ease;
        z-index: 1050;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .survei-preview-drawer.is-open {
        transform: translateX(0);
    }

    .survei-preview-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        padding: 28px 28px 20px;
    }

    .survei-preview-label {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 999px;
        background: #eff6ff;
        color: #2563eb;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .survei-preview-title {
        margin: 0;
        font-size: 24px;
        line-height: 1.3;
        color: #1f2937;
    }

    .survei-preview-close {
        width: 48px;
        height: 48px;
        border: 0;
        border-radius: 16px;
        background: #f8fafc;
        color: #64748b;
        font-size: 32px;
        line-height: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .survei-preview-body {
        flex: 1;
        overflow-y: auto;
        padding: 0 28px 24px;
    }

    .survei-preview-frame-wrap {
        background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
        border-radius: 24px;
        padding: 16px;
        min-height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .survei-preview-frame {
        width: 100%;
        height: 70vh;
        background: #fff;
        border-radius: 16px;
        border: 0;
    }

    .survei-preview-description {
        margin: 20px 0 0;
        font-size: 16px;
        line-height: 1.7;
        color: #475569;
    }

    .survei-preview-footer {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        padding: 20px 28px 28px;
        border-top: 1px solid #e5e7eb;
        background: #fff;
    }

    @media (max-width: 767.98px) {
        .survei-ikm-thumb,
        .survei-ikm-thumb--pdf {
            height: 300px;
        }

        .survei-preview-drawer {
            top: 12px;
            right: 12px;
            bottom: 12px;
            width: calc(100vw - 24px);
            border-radius: 24px;
        }

        .survei-preview-header,
        .survei-preview-body,
        .survei-preview-footer {
            padding-left: 18px;
            padding-right: 18px;
        }

        .survei-preview-title {
            font-size: 20px;
        }

        .survei-preview-frame-wrap {
            min-height: 320px;
        }

        .survei-preview-footer {
            justify-content: stretch;
        }

        .survei-preview-footer .btn {
            flex: 1;
        }
    }
</style>
<script>
    (function () {
        const cards = document.querySelectorAll('.js-open-survei-preview');
        const overlay = document.getElementById('surveiPreviewOverlay');
        const drawer = document.getElementById('surveiPreviewDrawer');
        const title = document.getElementById('surveiPreviewTitle');
        const description = document.getElementById('surveiPreviewDescription');
        const frame = document.getElementById('surveiPreviewFrame');
        const link = document.getElementById('surveiPreviewLink');
        const closeButton = document.getElementById('surveiPreviewClose');
        const closeFooterButton = document.getElementById('surveiPreviewCloseButton');

        if (!cards.length || !overlay || !drawer || !title || !description || !frame || !link) {
            return;
        }

        const openPreview = (card) => {
            const previewTitle = card.getAttribute('data-title') || 'Preview Survei IKM';
            const previewLink = card.getAttribute('data-link') || '#';

            title.textContent = previewTitle;
            description.textContent = previewTitle;
            frame.setAttribute('src', previewLink ? `${previewLink}#toolbar=0&navpanes=0` : '');
            link.setAttribute('href', previewLink);

            overlay.classList.add('is-open');
            drawer.classList.add('is-open');
            drawer.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        };

        const closePreview = () => {
            overlay.classList.remove('is-open');
            drawer.classList.remove('is-open');
            drawer.setAttribute('aria-hidden', 'true');
            frame.setAttribute('src', '');
            document.body.style.overflow = '';
        };

        cards.forEach((card) => {
            card.addEventListener('click', function () {
                openPreview(this);
            });

            card.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    openPreview(this);
                }
            });
        });

        overlay.addEventListener('click', closePreview);
        closeButton.addEventListener('click', closePreview);
        closeFooterButton.addEventListener('click', closePreview);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && drawer.classList.contains('is-open')) {
                closePreview();
            }
        });
    })();
</script>
@endsection
