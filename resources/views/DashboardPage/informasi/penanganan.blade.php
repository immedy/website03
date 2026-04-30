@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="row gy-5 g-xl-8">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Penanganan Pengaduan</span>
                            </h3>
                            <div class="card-toolbar">
                                <button type="button"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 border border-info"
                                    data-bs-toggle="modal" data-bs-target="#modalAddPenangananPengaduan">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-plus-square" viewBox="0 0 16 16">
                                            <path
                                                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5V7h2.5a.5.5 0 0 1 0 1H8.5v2.5a.5.5 0 0 1-1 0V8H5a.5.5 0 0 1 0-1h2.5V4.5A.5.5 0 0 1 8 4" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" tabindex="-1" id="modalAddPenangananPengaduan">
                            <div class="modal-dialog border border-danger">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Penanganan Pengaduan</h5>
                                    </div>
                                    <form action="{{ route('addPenangananPengaduan') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="fv-row mb-10">
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Deskripsi</label>
                                                <textarea name="deskripsi" class="form-control form-control-solid mb-3 mb-lg-0" rows="4" required></textarea>
                                            </div>
                                            <div class="fv-row mb-10">
                                                <label class="text-dark fw-bolder text-hover-primary fs-6">Upload Gambar</label>
                                                <input type="file" name="gambar" class="form-control form-control-solid mb-3 mb-lg-0"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-5px">No</th>
                                            <th class="min-w-200px">Deskripsi</th>
                                            <th class="min-w-120px">Gambar</th>
                                            <th class="min-w-100px text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penangananPengaduan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $item->gambar) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar"
                                                            style="max-width: 120px; height: auto; border-radius: 8px;">
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <form action="{{ route('deletePenangananPengaduan', $item->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button
                                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm border border-danger"
                                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                                <span class="svg-icon svg-icon-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-6">Belum ada data penanganan pengaduan.</td>
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
@endsection
