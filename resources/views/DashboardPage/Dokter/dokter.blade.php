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
                                <span class="card-label fw-bolder fs-3 mb-1">Referensi</span>
                            </h3>
                            <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-trigger="hover" title="Tambah Dokter">
                                {{-- @if (Auth::user()->akses != 1)
                            @else --}}
                            <div class="d-flex justify-content-end flex-shrink-0">
                                <a href="#" class=" btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 border border-info" data-bs-toggle="modal"
                                    data-bs-target="#modalAddDokter">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                          </svg>
                                    </span>                                    
                                </a>
                            </div>
                                {{-- @endif --}}
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
                                            <th class="w-25px">
                                                No
                                            </th>
                                            <th class="min-w-300px">Nama</th>
                                            <th class="min-w-100px text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dokter as $p)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <a class="text-dark fw-bolder text-hover-primary fs-6">{{ $p->nama }}</a>
                                                        <span class="text-muted fw-bold text-muted d-block fs-7">Spesialis : {{ $p->referensi->deskripsi }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end flex-shrink-0">
                                                    <a href="javascript:void(0)" data-url="{{route('InputJadwalDokter', $p->id)}}" id="JadwalDokter"
                                                        class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 border border-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Input Jadwal Dokter">
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
                                                    </a>
                                                    <a href="#"
                                                        class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1 border  border-danger">
                                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade " tabindex="-1" id="modalAddDokter">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dokter</h5>
                </div>
                <form action="{{ route('addDokter') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Jenis Spesialis</label>
                            <select name="spesialis" class="form-select form-select-solid"
                                data-dropdown-parent="#modalAddDokter" data-control="select2"
                                data-placeholder="Jenis Spesialis" required>
                                <option></option>
                                @foreach ($JenisDokter as $p)
                                    <option value="{{ $p->id }}">{{ $p->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Nama Lengkap serta Gelar</label>
                            <input type="text" name="nama" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" value="" required />                            
                        </div>
                        <div class="mb-10">
                            <label for="exampleFormControlInput1" class="form-label">Gambar</label>
                            <input type="file" class="form-control form-control-solid" placeholder="gambar"
                                name="gambar" required/>
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

    <div class="modal fade " tabindex="-1" id="JadwalDokterModal">
        <div class="modal-dialog border border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dokter-nama"></h5>
                </div>
                <form action="{{route('addJadwalDokter')}}" method="post" >
                    @csrf
                    <div class="modal-body">
                        <div class="fv-row ">
                            
                            <input type="text" name="dokter" id="dokter-id" class="form-control form-control-solid mb-3 mb-lg-0" hidden />
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Tanggal</label>
                            <input type="text" name="tanggal" id="TanggalJadwalDokter" class="form-control form-control-solid mb-3 mb-lg-0"/>                            
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Senin</label>
                            <select name="senin" class="form-select form-select-solid"
                                 required>
                                <option></option>
                                @foreach ($jadwalDokter as $p )
                                <option value="{{$p->id}}">{{$p->deskripsi}}</option>
                                @endforeach                                    
                            </select>
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Selasa</label>
                            <select name="selasa" class="form-select form-select-solid"
                                 required>
                                <option></option>
                                @foreach ($jadwalDokter as $p )
                                <option value="{{$p->id}}">{{$p->deskripsi}}</option>
                                @endforeach                                    
                            </select>
                        </div> 
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Rabu</label>
                            <select name="rabu" class="form-select form-select-solid"
                                 required>
                                <option></option>
                                @foreach ($jadwalDokter as $p )
                                <option value="{{$p->id}}">{{$p->deskripsi}}</option>
                                @endforeach                                    
                            </select>
                        </div>
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Kamis</label>
                            <select name="kamis" class="form-select form-select-solid"
                                 required>
                                <option></option>
                                @foreach ($jadwalDokter as $p )
                                <option value="{{$p->id}}">{{$p->deskripsi}}</option>
                                @endforeach                                    
                            </select>
                        </div>                                                  
                        <div class="fv-row ">
                            <label class="text-dark fw-bolder text-hover-primary fs-6">Jumat</label>
                            <select name="jumat" class="form-select form-select-solid"
                                 required>
                                <option></option>
                                @foreach ($jadwalDokter as $p )
                                <option value="{{$p->id}}">{{$p->deskripsi}}</option>
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
@endsection
