@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="row gy-5 g-xl-8">
                <div class="col-xl-12">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Index Kepuasan Masyarakat (IKM)</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Kelola dokumen PDF (Google Drive link)</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Tambah Dokumen IKM">
                                <button class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalAddIkm">
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
                                            <th class="min-w-350px">Nama Dokumen</th>
                                            <th class="min-w-120px">Status</th>
                                            <th class="min-w-150px">Sumber Dokumen</th>
                                            <th class="min-w-150px">Pegawai</th>
                                            <th class="min-w-200px">Link</th>
                                            <th class="min-w-10px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($documents as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <span class="text-dark fw-bolder fs-6">{{ $p->deskripsi }}</span>
                                                            <span class="text-muted fw-bold d-block fs-7">ID: {{ $p->id }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($p->status)
                                                        <span class="badge badge-light-success">Aktif</span>
                                                    @else
                                                        <span class="badge badge-light-danger">Nonaktif</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bold d-block fs-7">
                                                        {{ optional($p->sumberDokemen)->deskripsi ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="text-muted fw-bold d-block fs-7">
                                                        {{ optional($p->pegawai)->nama ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="{{ $p->link_dokumen }}" target="_blank" rel="noopener noreferrer"
                                                        class="text-primary fw-bold">
                                                        Buka
                                                    </a>
                                                </td>
                                                <td class="text-end">
                                                    <a href="{{ $p->download_url }}" target="_blank"
                                                        rel="noopener noreferrer" class="btn btn-sm btn-light-primary me-2">
                                                        Download
                                                    </a>
                                                    <button class="btn btn-sm btn-light btn-active-primary me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEditIkm{{ $p->id }}">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('dashboardIkmDelete', $p->id) }}" method="POST"
                                                        class="d-inline" onsubmit="return confirm('Hapus dokumen ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-light-danger">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div class="modal fade" tabindex="-1" id="modalEditIkm{{ $p->id }}">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form action="{{ route('dashboardIkmUpdate', $p->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Dokumen IKM</h5>
                                                                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span class="svg-icon svg-icon-2x"></span>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-6">
                                                                    <label class="form-label">Nama Dokumen</label>
                                                                    <input type="text" name="deskripsi"
                                                                        class="form-control form-control-solid"
                                                                        value="{{ $p->deskripsi }}" required>
                                                                </div>
                                                                
                                                                <div class="mb-6">
                                                                    <label class="form-label">Link Dokumen (Google Drive)</label>
                                                                    <input type="text" name="link_dokumen"
                                                                        class="form-control form-control-solid"
                                                                        value="{{ $p->link_dokumen }}" required>
                                                                    <div class="form-text">
                                                                        Contoh: https://drive.google.com/file/d/FILE_ID/view?usp=sharing
                                                                    </div>
                                                                </div>
                                                                <div class="mb-6">
                                                                    <label class="form-label">Sumber Dokumen</label>
                                                                    <select name="sumber_dokemen" class="form-select form-select-solid"
                                                                        data-control="select2"
                                                                        data-dropdown-parent="#modalEditIkm{{ $p->id }}"
                                                                        data-placeholder="Pilih sumber dokumen">
                                                                        <option value=""></option>
                                                                        @foreach ($data as $r)
                                                                            <option value="{{ $r->id }}"
                                                                                @selected($p->sumber_dokemen == $r->id)>
                                                                                {{ $r->deskripsi }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-6">
                                                                    <label class="form-label d-block">Status</label>
                                                                    <div class="form-check form-switch form-check-custom form-check-solid mt-2">
                                                                        <input class="form-check-input" type="checkbox" name="status"
                                                                            value="1" @if($p->status) checked @endif>
                                                                        <label class="form-check-label">Aktif</label>
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
                                                <td colspan="7" class="text-center text-muted py-10">
                                                    Belum ada dokumen IKM.
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

        <div class="modal fade" tabindex="-1" id="modalAddIkm">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="{{ route('dashboardIkmStore') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Dokumen IKM</h5>
                            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span class="svg-icon svg-icon-2x"></span>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="mb-6">
                                <label class="form-label">Nama Dokumen</label>
                                <input type="text" name="deskripsi" class="form-control form-control-solid"
                                    placeholder="Contoh: IKM Triwulan I 2026" required>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Link Dokumen (Google Drive)</label>
                                <input type="text" name="link_dokumen" class="form-control form-control-solid"
                                    placeholder="Tempel link Google Drive..." required>
                                <div class="form-text">
                                    Contoh: https://drive.google.com/file/d/FILE_ID/view?usp=sharing
                                </div>
                            </div>
                            <div class="mb-6">
                                <label class="form-label">Sumber Dokumen</label>
                                <select name="sumber_dokemen" class="form-select form-select-solid"
                                    data-control="select2"
                                    data-dropdown-parent="#modalAddIkm"
                                    data-placeholder="Pilih sumber dokumen">
                                    <option value=""></option>
                                    @foreach ($data as $r)
                                        <option value="{{ $r->id }}">{{ $r->deskripsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-6">
                                <label class="form-label d-block">Status</label>
                                <div class="form-check form-switch form-check-custom form-check-solid mt-2">
                                    <input class="form-check-input" type="checkbox" name="status" value="1" checked>
                                    <label class="form-check-label">Aktif</label>
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
    </div>
@endsection
