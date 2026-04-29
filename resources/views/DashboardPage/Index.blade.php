@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="row gy-5 g-xl-8">
                <div class="col-xl-12">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Menu Carousel</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Tambah">
                                <button class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                    data-bs-target="#carausel_1">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                rx="1" transform="rotate(-90 11.364 20.364)" fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Tambah
                                </button>
                            </div>
                        </div>
                        <!--end::Header-->
                        <div class="modal fade" tabindex="-1" id="carausel_1">
                            <div class="modal-dialog">
                                <form action="{{ route('AddCrousel') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-content modal-xl">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Input Crausel</h5>
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <span class="svg-icon svg-icon-2x"></span>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                                style="background-image: url({{ asset('DashboardPage/media/avatars/blank.png') }})">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper w-150px h-50px"></div>
                                                <!--end::Image preview wrapper-->

                                                <!--begin::Edit button-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>

                                                    <!--begin::Inputs-->
                                                    <input type="file" name="carusel" accept=".png, .jpg, .jpeg" />

                                                </label>
                                                <!--end::Edit button-->

                                            </div>
                                            <!--end::Image input-->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Section-->
                                <div class="mb-17">
                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed mb-9"></div>
                                    <!--end::Separator-->
                                    <!--begin::Row-->
                                    <div class="row g-10">
                                        <!--begin::Col-->
                                        @foreach ($carousel as $p)
                                            <div class="col-md-4">
                                                <!--begin::Hot sales post-->

                                                <div class="card-xl-stretch me-md-6">
                                                    <!--begin::Overlay-->
                                                    <a class="d-block overlay" data-fslightbox="lightbox-hot-sales">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                            style="background-image:url('{{ asset('storage/' . $p->carusel) }}')">
                                                        </div>
                                                        <!--end::Image-->
                                                        <!--begin::Action-->
                                                        <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                            <i class="bi bi-eye-fill fs-2x text-white"></i>
                                                        </div>
                                                        <!--end::Action-->
                                                    </a>
                                                    <!--end::Overlay-->
                                                </div>

                                                <!--end::Hot sales post-->
                                            </div>
                                        @endforeach
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                    <!--end::Tables Widget 9-->
                </div>
                @if (Auth()->user()->can('DashBoardDokumen'))
                    <div class="col-xl-12">
                        <!--begin::Tables Widget 9-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Menu Utama</span>
                                </h3>
                                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-trigger="hover" title="Tambah">
                                    <a href="{{ route('editor') }}" class="btn btn-sm btn-light btn-active-primary">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                    rx="1" transform="rotate(-90 11.364 20.364)"
                                                    fill="black" />
                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Tambah
                                    </a>
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fw-bolder text-muted">
                                                <th class="min-w-5px">No</th>
                                                <th class="min-w-150px">Judul</th>

                                                <th class="min-w-100px text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach ($Menu as $p)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex justify-content-start flex-column">
                                                                <a href="#"
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->judul }}</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-end flex-shrink-0">
                                                            <a href="{{ route('tampil', $p->id) }}"
                                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 border border-primary"
                                                                data-bs-toggle="tooltip" data-bs-placement="Top"
                                                                title="Edit">
                                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path opacity="0.3"
                                                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                            fill="black" />
                                                                        <path
                                                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </a>
                                                            <form action="{{ route('hapus', $p->id) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button
                                                                    onclick="return confirm ('Yakin Ingin Menghapus Data ini ?')"
                                                                    class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm border border-danger"
                                                                    data-bs-toggle="tooltip" data-bs-placement="Top"
                                                                    title="Hapus">
                                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                    <span class="svg-icon svg-icon-3">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path
                                                                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                                fill="black" />
                                                                            <path opacity="0.5"
                                                                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                                fill="black" />
                                                                            <path opacity="0.5"
                                                                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                                fill="black" />
                                                                        </svg>
                                                                    </span>
                                                                    <!--end::Svg Icon-->
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->

                            </div>
                            <!--begin::Body-->
                        </div>
                        <!--end::Tables Widget 9-->
                    </div>
                @else
                @endif
                <div class="col-xl-12">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Direktur</span>
                            </h3>
                            <form action="">
                                <div class="card-toolbar">
                                    <div class="card-toolbar">
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <button type="button"
                                                class=" btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 border border-info"
                                                data-bs-toggle="modal" data-bs-target="#modalAddDirektur">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-folder-plus"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z" />
                                                        <path
                                                            d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Header-->
                        {{-- Modal --}}
                        <div class="modal fade" tabindex="-1" id="modalAddDirektur">
                            <div class="modal-dialog border border-danger">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Direktur</h5>
                                    </div>
                                    <form action="{{route('addDirektur')}}" method="post" enctype="multipart/form-data"
                                        id="kt_docs_formvalidation_text">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="fv-row mb-10">
                                                <!--begin::Input-->
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Nama</label>
                                                <input type="text" name="nama_lengkap"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder=""
                                                    value="" required />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-10">
                                                <!--begin::Input-->
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Deskripsi</label>
                                                <input type="text" name="deskripsi"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder=""
                                                    value="" required />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-10">
                                                <!--begin::Input-->
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Awal
                                                    Menjabat</label>
                                                <input type="date" id="tanggalDari" name="awal_periode"
                                                    class="form-control form-control-solid mb-3 mb-lg-0" required />
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-10">
                                                <!--begin::Input-->
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Akhir
                                                    Menjabat</label>
                                                <div class="d-flex flex-column gap-3">
                                                    <input type="date" id="tanggalSampai" name="akhir_periode"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="" required />
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="Akhir_Menjabat_Sekarang">
                                                        <label class="form-check-label" for="Akhir_Menjabat_Sekarang">
                                                            Sekarang
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label for="direkturGambarInput" class="form-label">Gambar</label>
                                                <input type="file" class="form-control form-control-solid direktur-photo-input"
                                                    placeholder="gambar" name="foto_direktur" id="direkturGambarInput"
                                                    accept="image/*" required />
                                                <small class="text-muted d-block mt-2">Setelah pilih file, atur crop agar
                                                    ukuran foto seragam.</small>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary"><span class="indicator-label">
                                                    Simpan
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal  --}}

                        {{-- Crop Modal (before upload) --}}
                        <div class="modal fade" tabindex="-1" id="direkturCropModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Atur Crop Foto Direktur</h5>
                                        <button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal"
                                            aria-label="Close">Tutup</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-6">
                                            <div class="col-md-8">
                                                <div class="direktur-crop-wrap">
                                                    <img id="direkturCropImage" alt="Preview crop" />
                                                    <div class="direktur-crop-mask" aria-hidden="true"></div>
                                                </div>
                                                <div class="d-flex align-items-center gap-3 mt-4">
                                                    <span class="text-muted">Zoom</span>
                                                    <input type="range" class="form-range" id="direkturCropZoom"
                                                        min="1" max="3" step="0.01" value="1">
                                                    <button type="button" class="btn btn-sm btn-light"
                                                        id="direkturCropReset">Reset</button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-muted mb-3">Hasil (264 × 250)</div>
                                                <canvas id="direkturCropPreview" width="264" height="250"
                                                    class="border rounded w-100"></canvas>
                                                <small class="text-muted d-block mt-3">Drag foto untuk menggeser, lalu
                                                    atur zoom.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"
                                            id="direkturCropCancel">Batal</button>
                                        <button type="button" class="btn btn-primary" id="direkturCropApply">Gunakan
                                            Foto</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <style>
                            .direktur-crop-wrap {
                                position: relative;
                                width: 100%;
                                max-width: 520px;
                                margin: 0 auto;
                                aspect-ratio: 132 / 125;
                                background: #f5f8fa;
                                border-radius: 12px;
                                overflow: hidden;
                                user-select: none;
                                touch-action: none;
                            }

                            .direktur-crop-wrap img {
                                position: absolute;
                                top: 0;
                                left: 0;
                                will-change: transform;
                                transform-origin: 0 0;
                                max-width: none;
                                max-height: none;
                                -webkit-user-drag: none;
                                user-drag: none;
                            }

                            .direktur-crop-mask {
                                position: absolute;
                                inset: 0;
                                box-shadow: 0 0 0 9999px rgba(0, 0, 0, 0.35);
                                border: 2px solid rgba(255, 255, 255, 0.85);
                                border-radius: 12px;
                                pointer-events: none;
                            }
                        </style>

                        <script>
                            (function() {
                                function initWhenReady() {
                                    if (!window.bootstrap || !window.bootstrap.Modal) {
                                        setTimeout(initWhenReady, 50);
                                        return;
                                    }

                                    const fileInputs = document.querySelectorAll('.direktur-photo-input');
                                    const cropModalEl = document.getElementById('direkturCropModal');
                                    const cropImg = document.getElementById('direkturCropImage');
                                    const cropWrap = cropImg?.closest('.direktur-crop-wrap');
                                    const zoomEl = document.getElementById('direkturCropZoom');
                                    const resetBtn = document.getElementById('direkturCropReset');
                                    const applyBtn = document.getElementById('direkturCropApply');
                                    const cancelBtn = document.getElementById('direkturCropCancel');
                                    const previewCanvas = document.getElementById('direkturCropPreview');
                                    const previewCtx = previewCanvas?.getContext('2d');

                                    const akhirDate = document.getElementById('Akhir_Menjabat');
                                    const akhirSwitch = document.getElementById('Akhir_Menjabat_Sekarang');
                                    const akhirValue = document.getElementById('Akhir_Menjabat_Value');

                                    if (akhirDate && akhirSwitch && akhirValue) {
                                        const syncAkhir = () => {
                                            if (akhirSwitch.checked) {
                                                akhirDate.value = '';
                                                akhirDate.disabled = true;
                                                akhirDate.required = false;
                                                akhirValue.value = 'Sekarang';
                                            } else {
                                                akhirDate.disabled = false;
                                                akhirDate.required = true;
                                                akhirValue.value = akhirDate.value || '';
                                            }
                                        };
                                        akhirSwitch.addEventListener('change', syncAkhir);
                                        akhirDate.addEventListener('change', syncAkhir);
                                        syncAkhir();
                                    }

                                    if (!fileInputs.length || !cropModalEl || !cropImg || !cropWrap || !zoomEl || !resetBtn || !applyBtn || !cancelBtn || !
                                        previewCanvas || !previewCtx) return;

                                    const bsCropModal = new window.bootstrap.Modal(cropModalEl, {
                                        backdrop: 'static',
                                        keyboard: false
                                    });

                                    let objectUrl = null;
                                    let currentInput = null;
                                    let baseScale = 1;
                                    let zoom = 1;
                                    let translateX = 0;
                                    let translateY = 0;
                                    let isDragging = false;
                                    let dragStartX = 0;
                                    let dragStartY = 0;
                                    let startX = 0;
                                    let startY = 0;

                                    function clamp(val, min, max) {
                                        return Math.max(min, Math.min(max, val));
                                    }

                                    function viewport() {
                                        const rect = cropWrap.getBoundingClientRect();
                                        return {
                                            w: rect.width,
                                            h: rect.height
                                        };
                                    }

                                    function currentScale() {
                                        return baseScale * zoom;
                                    }

                                    function applyTransform() {
                                        cropImg.style.transform =
                                            `translate(${translateX}px, ${translateY}px) scale(${currentScale()})`;
                                        drawPreview();
                                    }

                                    function fitImageToViewport() {
                                        const v = viewport();
                                        const nW = cropImg.naturalWidth || 1;
                                        const nH = cropImg.naturalHeight || 1;

                                        baseScale = Math.max(v.w / nW, v.h / nH);
                                        zoom = 1;
                                        zoomEl.value = '1';

                                        const scaledW = nW * baseScale;
                                        const scaledH = nH * baseScale;
                                        translateX = (v.w - scaledW) / 2;
                                        translateY = (v.h - scaledH) / 2;

                                        applyTransform();
                                    }

                                    function constrainPan() {
                                        const v = viewport();
                                        const nW = cropImg.naturalWidth || 1;
                                        const nH = cropImg.naturalHeight || 1;
                                        const s = currentScale();

                                        const scaledW = nW * s;
                                        const scaledH = nH * s;

                                        const minX = v.w - scaledW;
                                        const minY = v.h - scaledH;

                                        if (minX > 0) translateX = minX / 2;
                                        else translateX = clamp(translateX, minX, 0);

                                        if (minY > 0) translateY = minY / 2;
                                        else translateY = clamp(translateY, minY, 0);
                                    }

                                    function drawPreview() {
                                        const v = viewport();
                                        const nW = cropImg.naturalWidth || 1;
                                        const nH = cropImg.naturalHeight || 1;
                                        const s = currentScale();

                                        const srcX = (-translateX) / s;
                                        const srcY = (-translateY) / s;
                                        const srcW = v.w / s;
                                        const srcH = v.h / s;

                                        previewCtx.clearRect(0, 0, previewCanvas.width, previewCanvas.height);
                                        previewCtx.fillStyle = '#f5f8fa';
                                        previewCtx.fillRect(0, 0, previewCanvas.width, previewCanvas.height);

                                        const cX = clamp(srcX, 0, Math.max(0, nW - 1));
                                        const cY = clamp(srcY, 0, Math.max(0, nH - 1));
                                        const cW = clamp(srcW, 1, nW - cX);
                                        const cH = clamp(srcH, 1, nH - cY);

                                        previewCtx.drawImage(cropImg, cX, cY, cW, cH, 0, 0, previewCanvas.width,
                                            previewCanvas.height);
                                    }

                                    function revokeObjectUrl() {
                                        if (objectUrl) URL.revokeObjectURL(objectUrl);
                                        objectUrl = null;
                                    }

                                    function clearAndClose() {
                                        bsCropModal.hide();
                                        revokeObjectUrl();
                                    }

                                    function onPointerDown(ev) {
                                        isDragging = true;
                                        dragStartX = ev.clientX;
                                        dragStartY = ev.clientY;
                                        startX = translateX;
                                        startY = translateY;
                                        cropWrap.setPointerCapture?.(ev.pointerId);
                                    }

                                    function onPointerMove(ev) {
                                        if (!isDragging) return;
                                        translateX = startX + (ev.clientX - dragStartX);
                                        translateY = startY + (ev.clientY - dragStartY);
                                        constrainPan();
                                        applyTransform();
                                    }

                                    function onPointerUp() {
                                        isDragging = false;
                                    }

                                    cropWrap.addEventListener('pointerdown', onPointerDown);
                                    cropWrap.addEventListener('pointermove', onPointerMove);
                                    cropWrap.addEventListener('pointerup', onPointerUp);
                                    cropWrap.addEventListener('pointercancel', onPointerUp);
                                    cropWrap.addEventListener('pointerleave', onPointerUp);

                                    zoomEl.addEventListener('input', () => {
                                        const oldScale = currentScale();
                                        zoom = parseFloat(zoomEl.value || '1');
                                        const newScale = currentScale();

                                        const v = viewport();
                                        const centerX = v.w / 2;
                                        const centerY = v.h / 2;

                                        translateX = centerX - (centerX - translateX) * (newScale / oldScale);
                                        translateY = centerY - (centerY - translateY) * (newScale / oldScale);

                                        constrainPan();
                                        applyTransform();
                                    });

                                    resetBtn.addEventListener('click', () => fitImageToViewport());
                                    cancelBtn.addEventListener('click', () => {
                                        if (currentInput) {
                                            currentInput.value = '';
                                        }
                                        clearAndClose();
                                    });

                                    fileInputs.forEach((input) => {
                                        input.addEventListener('change', () => {
                                            const file = input.files && input.files[0];
                                            if (!file) return;
                                            if (!file.type.startsWith('image/')) return;

                                            currentInput = input;
                                            revokeObjectUrl();
                                            objectUrl = URL.createObjectURL(file);
                                            cropImg.src = objectUrl;

                                            cropImg.onload = () => {
                                                fitImageToViewport();
                                                bsCropModal.show();
                                            };
                                        });
                                    });

                                    applyBtn.addEventListener('click', async () => {
                                        const outW = 264;
                                        const outH = 250;
                                        const canvas = document.createElement('canvas');
                                        canvas.width = outW;
                                        canvas.height = outH;
                                        const ctx = canvas.getContext('2d');
                                        if (!ctx) return;

                                        const v = viewport();
                                        const nW = cropImg.naturalWidth || 1;
                                        const nH = cropImg.naturalHeight || 1;
                                        const s = currentScale();

                                        const srcX = (-translateX) / s;
                                        const srcY = (-translateY) / s;
                                        const srcW = v.w / s;
                                        const srcH = v.h / s;

                                        const cX = clamp(srcX, 0, Math.max(0, nW - 1));
                                        const cY = clamp(srcY, 0, Math.max(0, nH - 1));
                                        const cW = clamp(srcW, 1, nW - cX);
                                        const cH = clamp(srcH, 1, nH - cY);

                                        ctx.fillStyle = '#ffffff';
                                        ctx.fillRect(0, 0, outW, outH);
                                        ctx.drawImage(cropImg, cX, cY, cW, cH, 0, 0, outW, outH);

                                        const blob = await new Promise((resolve) => canvas.toBlob(resolve, 'image/jpeg',
                                            0.9));
                                        if (!blob) return;

                                        const originalName = (currentInput && currentInput.files && currentInput.files[0] && currentInput.files[0]
                                                .name) ? currentInput.files[0].name : 'direktur.jpg';
                                        const safeName = originalName.replace(/\.[^.]+$/, '') + '-crop.jpg';
                                        const croppedFile = new File([blob], safeName, {
                                            type: 'image/jpeg'
                                        });

                                        const dt = new DataTransfer();
                                        dt.items.add(croppedFile);
                                        if (currentInput) {
                                            currentInput.files = dt.files;
                                        }

                                        clearAndClose();
                                    });

                                    cropModalEl.addEventListener('hidden.bs.modal', () => {
                                        revokeObjectUrl();
                                        currentInput = null;
                                    });
                                }

                                if (document.readyState === 'loading') {
                                    document.addEventListener('DOMContentLoaded', initWhenReady);
                                } else {
                                    initWhenReady();
                                }
                            })();
                        </script>

                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin::Table container-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-5px">No </th>
                                            <th class="min-w-150px">Nama</th>
                                            <th>Deskripsi</th>
                                            <th class="">Masa Jabatan</th>
                                            <th class="min-w-100px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody>
                                        @foreach ($direktur as $p)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->nama_lengkap }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->deskripsi }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="#"
                                                                class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->awal_periode }} - {{ $p->akhir_periode }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                        
                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <button type="button"
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 border border-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEditDirektur{{ $p->id }}"
                                                            title="Edit">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                        <form action="{{ route('deleteDirektur', $p->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                onclick="return confirm ('Yakin Ingin Menghapus Data ini ?')"
                                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm border border-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="Top"
                                                                title="Hapus">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24"
                                                                        fill="none">
                                                                        <path
                                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                                            fill="black" />
                                                                        <path opacity="0.5"
                                                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                                            fill="black" />
                                                                        <path opacity="0.5"
                                                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                                            fill="black" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->

                        </div>
                        <!--begin::Body-->
                    </div>
                    @foreach ($direktur as $p)
                        <div class="modal fade" tabindex="-1" id="modalEditDirektur{{ $p->id }}">
                            <div class="modal-dialog border border-primary">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Direktur</h5>
                                    </div>
                                    <form action="{{ route('updateDirektur', $p->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="fv-row mb-10">
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Nama</label>
                                                <input type="text" name="nama_lengkap" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    value="{{ $p->nama_lengkap }}" required />
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Deskripsi</label>
                                                <input type="text" name="deskripsi" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    value="{{ $p->deskripsi }}" required />
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Awal Menjabat</label>
                                                <input type="date" name="awal_periode" class="form-control form-control-solid mb-3 mb-lg-0" id="tanggalDari"
                                                    value="{{ $p->awal_periode }}" required />
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Akhir Menjabat</label>
                                                <input type="date" name="akhir_periode" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    value="{{ $p->akhir_periode }}" />
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="form-label">Ganti Gambar (Opsional)</label>
                                                <input type="file" class="form-control form-control-solid direktur-photo-input" name="foto_direktur"
                                                    accept="image/*" />
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--end::Tables Widget 9-->
                </div>
            </div>
        </div>
    </div>
@endsection
