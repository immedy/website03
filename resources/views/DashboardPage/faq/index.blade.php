@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="row gy-5 g-xl-8">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">FAQ</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Kelola pertanyaan & jawaban</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Tambah FAQ">
                                <button class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalAddFaq">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                fill="black" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    Tambah
                                </button>
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-5px">No</th>
                                            <th class="min-w-350px">Pertanyaan</th>
                                            <th class="min-w-50px">Urutan</th>
                                            <th class="min-w-50px">Status</th>
                                            <th class="min-w-150px">Pegawai</th>
                                            <th class="min-w-150px">Update</th>
                                            <th class="min-w-10px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faqs as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span class="text-dark fw-bolder fs-6">{{ $p->pertanyaan }}</span>
                                                            <span class="text-muted fw-bold d-block fs-7">
                                                                {{ \Illuminate\Support\Str::limit(strip_tags($p->jawaban), 80) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-light-info">{{ $p->urutan }}</span>
                                                </td>
                                                <td>
                                                    @if ($p->status)
                                                        <span class="badge badge-light-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-light-danger">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bold">
                                                        {{ optional($p->pegawai)->nama ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bold">
                                                        {{ optional($p->updated_at)->diffForHumans() }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <button
                                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 border border-primary"
                                                            data-bs-toggle="modal" data-bs-target="#modalEditFaq{{ $p->id }}"
                                                            title="Edit">
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L13.489 4.75098L19.245 10.507L5.574 21.3Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                        </button>

                                                        <form action="{{ route('dashboardFaqDelete', $p->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                onclick="return confirm('Yakin ingin menonaktifkan FAQ ini?')"
                                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm border border-danger"
                                                                title="Nonaktifkan" @if(!$p->status) disabled @endif>
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none">
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
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" tabindex="-1" id="modalEditFaq{{ $p->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form action="{{ route('dashboardFaqUpdate', $p->id) }}" method="POST">
                                                            @csrf
                                                            @method('put')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit FAQ</h5>
                                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span class="svg-icon svg-icon-2x"></span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-6">
                                                                    <label class="form-label">Pertanyaan</label>
                                                                    <input type="text" name="pertanyaan"
                                                                        class="form-control form-control-solid"
                                                                        value="{{ $p->pertanyaan }}" required>
                                                                </div>
                                                                <div class="mb-6">
                                                                    <label class="form-label">Jawaban</label>
                                                                    <textarea name="jawaban" rows="6"
                                                                        class="form-control form-control-solid" required>{{ $p->jawaban }}</textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 mb-6">
                                                                        <label class="form-label">Urutan</label>
                                                                        <input type="number" name="urutan" min="0"
                                                                            class="form-control form-control-solid"
                                                                            value="{{ $p->urutan }}">
                                                                    </div>
                                                                    <div class="col-md-6 mb-6">
                                                                        <label class="form-label d-block">Status</label>
                                                                        <div class="form-check form-switch form-check-custom form-check-solid mt-2">
                                                                            <input class="form-check-input" type="checkbox" name="status"
                                                                                value="1" @if($p->status) checked @endif>
                                                                            <label class="form-check-label">Aktif</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-10">
                                                    Belum ada data FAQ.
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

        <div class="modal fade" tabindex="-1" id="modalAddFaq">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('dashboardFaqStore') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah FAQ</h5>
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-6">
                                <label class="form-label">Pertanyaan</label>
                                <input type="text" name="pertanyaan" class="form-control form-control-solid"
                                    placeholder="Tulis pertanyaan..." required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Jawaban</label>
                                <textarea name="jawaban" rows="6" class="form-control form-control-solid"
                                    placeholder="Tulis jawaban..." required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-6">
                                    <label class="form-label">Urutan</label>
                                    <input type="number" name="urutan" min="0"
                                        class="form-control form-control-solid" placeholder="Kosongkan untuk otomatis">
                                </div>
                                <div class="col-md-6 mb-6">
                                    <label class="form-label d-block">Status</label>
                                    <div class="form-check form-switch form-check-custom form-check-solid mt-2">
                                        <input class="form-check-input" type="checkbox" name="status" value="1"
                                            checked>
                                        <label class="form-check-label">Aktif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
