@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="row gy-5 g-xl-8">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Survei IKM</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Kelola dokumen PDF survei yang diunggah</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Tambah Survei IKM">
                                <button class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalAddSurvei">
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
                                    Tambah Survei
                                </button>
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <thead>
                                        <tr class="fw-bolder text-muted">
                                            <th class="min-w-40px">No</th>
                                            <th class="min-w-280px">Deskripsi</th>
                                            <th class="min-w-150px">Pegawai</th>
                                            <th class="min-w-100px">Status</th>
                                            <th class="min-w-120px">Dokumen</th>
                                            <th class="min-w-170px text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($surveis as $survei)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-dark fw-bolder fs-6">{{ $survei->deskripsi }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bold fs-7">
                                                        {{ optional($survei->pegawai)->nama ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($survei->status)
                                                        <span class="badge badge-light-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-light-danger">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ $survei->dokumen_url }}" target="_blank" rel="noopener noreferrer"
                                                        class="btn btn-sm btn-light-primary">
                                                        Lihat PDF
                                                    </a>
                                                </td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-primary me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditSurvei{{ $survei->id }}">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('dashboardIkmSurveyDelete', $survei->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Hapus survei ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light-danger">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" tabindex="-1" id="modalEditSurvei{{ $survei->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form action="{{ route('dashboardIkmSurveyUpdate', $survei->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Survei IKM</h5>
                                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span class="svg-icon svg-icon-2x"></span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-6">
                                                                    <label class="form-label required">Deskripsi</label>
                                                                    <input type="text" name="deskripsi"
                                                                        class="form-control form-control-solid"
                                                                        value="{{ $survei->deskripsi }}" required>
                                                                </div>

                                                                <div class="mb-6">
                                                                    <label class="form-label">Dokumen Saat Ini</label>
                                                                    <div>
                                                                        <a href="{{ $survei->dokumen_url }}" target="_blank"
                                                                            rel="noopener noreferrer" class="btn btn-sm btn-light-primary">
                                                                            Buka PDF
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-6">
                                                                    <label class="form-label">Ganti Dokumen PDF</label>
                                                                    <input type="file" name="dokumen" accept="application/pdf"
                                                                        class="form-control form-control-solid">
                                                                    <div class="form-text">Kosongkan jika dokumen tidak ingin diganti.</div>
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
                                                    Belum ada data survei IKM.
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

        <div class="modal fade" tabindex="-1" id="modalAddSurvei">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('dashboardIkmSurveyStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Survei IKM</h5>
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-6">
                                <label class="form-label required">Deskripsi</label>
                                <input
                                    type="text"
                                    name="deskripsi"
                                    value="{{ old('deskripsi') }}"
                                    class="form-control form-control-solid @error('deskripsi') is-invalid @enderror"
                                    placeholder="Contoh: Survei IKM Farmasi Rawat Inap"
                                    required
                                >
                                @error('deskripsi')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label class="form-label required">Dokumen PDF</label>
                                <input
                                    type="file"
                                    name="dokumen"
                                    accept="application/pdf"
                                    class="form-control form-control-solid @error('dokumen') is-invalid @enderror"
                                    required
                                >
                                <div class="form-text">Hanya file PDF, maksimal 10 MB.</div>
                                @error('dokumen')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
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
    </div>
@endsection
