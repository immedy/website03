@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="row">
                <!--begin::Col-->
                <div class="col-xl">
                    <!--begin::Tables Widget 9-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">Pegawai</span>
                            </h3>
                            <form action="">
                                <div class="card-toolbar">
                                    <div>
                                        <input type="text" name="caripegawai" value="{{ request('caripegawai') }}"
                                            class="form-control sm me-1" placeholder="Cari Pegawai" />
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="btn btn-icon btn-outline-warning btn-active-light-info border border-success btn-sm me-1"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cari Pegawai"><span
                                                class="indicator-label">
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                        <path
                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </button>
                                    </div>

                                    <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-trigger="hover" title="Tambah Pegawai">
                                        {{-- @if (Auth::user()->akses != 1)
                            @else --}}
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="#"
                                                class=" btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 border border-info"
                                                data-bs-toggle="modal" data-bs-target="#modalAddPegawai">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                        <path fill-rule="evenodd"
                                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </form>


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
                                            <th class="w-25px">
                                                No
                                            </th>
                                            <th class="min-w-150px">NIP</th>
                                            <th class="min-w-300px">Nama</th>
                                            <th class="min-w-170px">Ruangan</th>
                                            <th class="min-w-300px">Username</th>
                                            <th class="min-w-100px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawai as $p)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a class="text-dark fw-bolder text-hover-primary fs-6"></a>
                                                            {{ $p->nip }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a class="text-dark fw-bolder text-hover-primary fs-6"></a>
                                                            {{ $p->nama }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a class="text-dark fw-bolder text-hover-primary fs-6"></a>
                                                            {{ $p->ReferensiRuangan->deskripsi }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex justify-content-start flex-column">
                                                            @if (!empty($p->User->username))
                                                                <a
                                                                    class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->User->username }}</a>
                                                            @endif
                                                            @if (!empty($p->User->akses))
                                                                <span
                                                                    class="text-muted fw-bold text-muted d-block fs-7">Jenis
                                                                    Akses : {{ $p->User->ReferensiAkses->deskripsi }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-end flex-shrink-0">
                                                        <a href="javascript:void(0)"
                                                            data-url="{{ route('CariUsername', $p->id) }}" id="Username"
                                                            class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 border border-success"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Username">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-shield-lock" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z" />
                                                                    <path
                                                                        d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z" />
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                        <a href="javascript:void(0)"
                                                            data-url="{{ route('CariUsername', $p->id) }}" id="Pegawai"
                                                            class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 border border-info"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Edit Pegawai">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                                </svg>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </a>
                                                        <a href="#"
                                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1 border  border-danger">
                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                                    <path
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{$pegawai->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- add Pegawai --}}
    <div class="modal fade " tabindex="-1" id="modalAddPegawai">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pegawai</h5>
                </div>
                <form action="{{ route('AddOrUpdatePegawai') }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">No Induk Pegawai</label>
                            <input type="text" name="nip" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="NIP" autofocus required />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Nama </label>
                            <input type="text" name="nama" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" value="" required />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Ruangan</label>
                            <select name="ruangan" class="form-select form-select-solid"
                                data-dropdown-parent="#modalAddPegawai" data-control="select2"
                                data-placeholder="Pilih Jenis Referensi" required>
                                <option></option>
                                @foreach ($Ruangan as $p)
                                    <option value="{{ $p->id }}">{{ $p->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><span class="indicator-label">
                                Simpan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end Add Pegawai --}}

    {{-- Edit UserName --}}
    <div class="modal fade " tabindex="-1" id="CariUsername">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="user-nama"></h5>
                </div>
                <form action="{{ route('AddorUpdate') }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Username</label>
                            <label class="text-dark fw-bolder text-hover-primary fs-6" id="pegawai_id"></label>
                            <input type="text" name="username" id="user-user" autofocus
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value=""
                                required />

                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-3">

                            <input type="text" name="pegawai_id" id="id"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value=""
                                required hidden />

                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Akses Level</label>
                            <select name="akses" class="form-select form-select-solid"
                                data-dropdown-parent="#CariUsername" data-control="select2" required
                                data-placeholder="Pilih Akses">
                                <option>
                                    @foreach ($hakakses as $p)
                                <option value="{{ $p->id }}">{{ $p->deskripsi }}</option>
                                @endforeach
                                </option>
                            </select>
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Password</label>
                            <input type="password" name="password" id="user-password"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value=""
                                required />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Konfirmasi Password</label>
                            <input type="password" name="confirm-password"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" id="confirm-password"
                                required />
                            <small id="error" class="text-danger d-none">Password Tidak Sama..</small>
                            <!--end::Input-->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary" id="validasi-password" disabled><span
                                class="indicator-label">
                                Simpan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ENd Edit Username --}}

    {{-- Edit Pegawai --}}
    <div class="modal fade " tabindex="-1" id="EditPegawai">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pegawai</h5>
                </div>
                <form action="{{ route('AddOrUpdatePegawai') }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">NIP</label>
                            <input type="text" name="id" id="user-id" hidden>
                            <input type="text" name="nip" id="user-nip" autofocus
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value=""
                                required  />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Nama</label>
                            <input type="text" name="nama" id="user-namapegawai"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value=""
                                required />
                            <!--end::Input-->
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Ruangan</label>
                            <select name="ruangan" class="form-select form-select-solid"
                                data-dropdown-parent="#EditPegawai" data-control="select2"
                                data-placeholder="Pilih Ruangan" required>
                                <option>
                                    @foreach ($Ruangan as $p)
                                <option value="{{ $p->id }}">{{ $p->deskripsi }}</option>
                                @endforeach
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary"><span class="indicator-label">
                                Simpan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End Edit Pegawai --}}
@endsection
