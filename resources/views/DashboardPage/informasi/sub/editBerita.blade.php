@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card">
                <form action="{{ route('simpanberita') }}" method="post" enctype="multipart/form-data" class="berita-preview-form">
                    @csrf
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-10">
                            <div>
                                <h3 class="mb-1">Edit Berita</h3>
                                <span class="text-muted">Preview menampilkan hasil akhir seperti halaman detail berita di landing page.</span>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-light-primary active berita-mode-btn" data-mode="editor">Editor</button>
                                <button type="button" class="btn btn-light berita-mode-btn" data-mode="preview">Preview</button>
                            </div>
                        </div>

                        <div class="berita-editor-panel">
                            <div class="mb-10">
                                <label for="judulBerita" class="required form-label">Judul Berita</label>
                                <input type="text" id="judulBerita" class="form-control form-control-solid berita-judul-input" value="{{ $berita->judul }}"
                                    name="judul" required />
                                <input type="text" name="id" hidden value="{{ $berita->id }}">
                            </div>
                            <div class="mb-10">
                                <label for="kategoriBerita" class="required form-label">Kategori</label>
                                <select id="kategoriBerita" class="form-select form-select-solid berita-kategori-input" name="kategori">
                                    <option value="{{ $berita->kategori }}">{{ $berita->kategori }}</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-10">
                                <label for="gambarBerita" class="form-label">Gambar</label>
                                <input type="file" id="gambarBerita" class="form-control form-control-solid berita-gambar-input" placeholder="gambar"
                                    name="gambar" accept="image/*" />
                            </div>
                            <div class="mb-0">
                                <label for="editor" class="required form-label">Konten</label>
                                <textarea name="kontent" id="editor" class="berita-konten-input" rows="12" required
                                    placeholder="Tulis Artikel Di sini">{!! $berita->kontent !!}</textarea>
                            </div>
                        </div>

                        <div class="berita-preview-panel d-none">
                            <div class="berita-landing-preview">
                                <section class="blog_area single-post-area section-padding py-8">
                                    <div class="container-fluid px-0">
                                        <div class="row justify-content-center mx-0">
                                            <div class="col-lg-10 posts-list">
                                                <div class="single-post bg-white rounded-4 shadow-sm p-6">
                                                    <h2 class="berita-preview-judul mb-4">{{ $berita->judul }}</h2>
                                                    <div class="feature-img berita-preview-image-wrap @if(empty($berita->gambar)) d-none @endif">
                                                        <img class="img-fluid w-100 rounded-3 berita-preview-image"
                                                            src="@if(!empty($berita->gambar)) {{ asset('storage/' . $berita->gambar) }} @endif"
                                                            alt="Preview gambar berita">
                                                    </div>
                                                    <div class="blog_details mt-4">
                                                        <ul class="blog-info-link mt-3 mb-4 list-inline">
                                                            <li class="list-inline-item me-5"><a href="#"><i class="fa fa-user"></i> Oleh Admin</a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fa fa-time"></i> Baru saja</a></li>
                                                        </ul>
                                                        <p class="text-muted mb-4 berita-preview-kategori">{{ $berita->kategori }}</p>
                                                        <div class="excert berita-preview-konten">
                                                            {!! $berita->kontent !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="/dashboard/berita" class="btn btn-danger"> <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd"
                                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg>
                            </span>Keluar</a>
                        <button type="submit" class="btn btn-primary"><span class="indicator-label">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-save2" viewBox="0 0 16 16">
                                        <path
                                            d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v4.5h2a.5.5 0 0 1 .354.854l-2.5 2.5a.5.5 0 0 1-.708 0l-2.5-2.5A.5.5 0 0 1 5.5 6.5h2V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                    </svg>
                                </span>
                                Simpan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .berita-landing-preview .single-post {
                border: 1px solid #e4e6ef;
            }

            .berita-preview-konten img,
            .berita-preview-konten iframe {
                max-width: 100%;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var form = document.querySelector('.berita-preview-form');

                if (!form) {
                    return;
                }

                var judulInput = form.querySelector('.berita-judul-input');
                var kategoriInput = form.querySelector('.berita-kategori-input');
                var gambarInput = form.querySelector('.berita-gambar-input');
                var kontenInput = form.querySelector('.berita-konten-input');
                var editorPanel = form.querySelector('.berita-editor-panel');
                var previewPanel = form.querySelector('.berita-preview-panel');
                var modeButtons = form.querySelectorAll('.berita-mode-btn');
                var previewJudul = form.querySelector('.berita-preview-judul');
                var previewKategori = form.querySelector('.berita-preview-kategori');
                var previewKonten = form.querySelector('.berita-preview-konten');
                var previewImageWrap = form.querySelector('.berita-preview-image-wrap');
                var previewImage = form.querySelector('.berita-preview-image');

                function getKontenValue() {
                    if (CKEDITOR.instances.editor) {
                        return CKEDITOR.instances.editor.getData();
                    }

                    return kontenInput.value;
                }

                function updatePreview() {
                    var selectedKategori = kategoriInput.options[kategoriInput.selectedIndex];
                    previewJudul.textContent = judulInput.value.trim() || 'Judul berita akan tampil di sini';
                    previewKategori.textContent = selectedKategori ? selectedKategori.text : 'Kategori terpilih akan tampil di sini';
                    previewKonten.innerHTML = getKontenValue().trim() || 'Konten berita akan tampil di sini.';
                }

                modeButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var isPreview = button.dataset.mode === 'preview';

                        modeButtons.forEach(function(item) {
                            item.classList.toggle('btn-light-primary', item === button);
                            item.classList.toggle('active', item === button);
                            item.classList.toggle('btn-light', item !== button);
                        });

                        editorPanel.classList.toggle('d-none', isPreview);
                        previewPanel.classList.toggle('d-none', !isPreview);

                        if (isPreview) {
                            updatePreview();
                        }
                    });
                });

                judulInput.addEventListener('input', updatePreview);
                kategoriInput.addEventListener('change', updatePreview);

                gambarInput.addEventListener('change', function(event) {
                    var file = event.target.files[0];

                    if (!file) {
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function(loadEvent) {
                        previewImage.src = loadEvent.target.result;
                        previewImageWrap.classList.remove('d-none');
                    };
                    reader.readAsDataURL(file);
                });

                if (CKEDITOR.instances.editor) {
                    CKEDITOR.instances.editor.on('change', updatePreview);
                } else {
                    CKEDITOR.on('instanceReady', function(event) {
                        if (event.editor.name === 'editor') {
                            event.editor.on('change', updatePreview);
                        }
                    });
                }

                updatePreview();
            });
        </script>
    @endpush
@endsection
