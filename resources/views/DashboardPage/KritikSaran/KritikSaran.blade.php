@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <div class="col-xxl">
                <!--begin::Tables Widget 5-->
                <div class="card card-xxl-stretch mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Kritik Dan Saran</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <div class="tab-content">
                            <!--begin::Tap pane-->
                            <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="border-0">
                                                <th class="p-0 w-50px">No</th>
                                                <th class="p-0 min-w-50px">Nama</th>
                                                <th class="p-0 min-w-140px text-center">No Telepon</th>
                                                <th class="p-0 min-w-110px text-center">Pesan</th>
                                                <th class="p-0 min-w-50px text-center">Penilaian</th>
                                                <th class="p-0 min-w-50px text-center">Kecurangan</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach ($KritikSaran as $p)
                                                <tr>
                                                    <td>
                                                        {{ $loop->iteration }}
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark fw-bolder text-hover-primary mb-1 fs-6">{{ $p->nama }}</a>
                                                        <span class="text-muted fw-bold d-block">Alamat :
                                                            {{ $p->alamat }}</span>
                                                    </td>
                                                    <td class="text-center text-muted fw-bold">{{ $p->notelepon }}</td>
                                                    <td class="text-center text-muted fw-bold">
                                                        <a href="javascript:void(0)" id="pesan"
                                                            data-url="{{ route('TampilPesan', $p->id) }}"
                                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Lihat">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="18" y="13"
                                                                        width="13" height="2" rx="1"
                                                                        transform="rotate(-180 18 13)" fill="black" />
                                                                    <path
                                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        @switch($p->nilai)
                                                            @case('1')
                                                                <span
                                                                    class="badge badge-light-dark">{{ $p->referensi->deskripsi }}</span>
                                                            @break

                                                            @case('2')
                                                                <span
                                                                    class="badge badge-light-danger">{{ $p->referensi->deskripsi }}</span>
                                                            @break

                                                            @case('3')
                                                                <span
                                                                    class="badge badge-light-warning">{{ $p->referensi->deskripsi }}</span>
                                                            @break

                                                            @case('4')
                                                                <span
                                                                    class="badge badge-light-info">{{ $p->referensi->deskripsi }}</span>
                                                            @break

                                                            @case('5')
                                                                <span
                                                                    class="badge badge-light-success">{{ $p->referensi->deskripsi }}</span>
                                                            @break

                                                            @default
                                                        @endswitch

                                                    </td>
                                                    <td class="text-center">
                                                        {{$p->kecurangan}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Tables Widget 5-->
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade " tabindex="-1" id="pesanShowModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="">

                    <div class="modal-body">
                        <div class="fv-row mb-3">
                            <label class="text-dark fw-bolder text-hover-primary fs-6 mb-5">Kritik Atau Saran</label>
                            <p id="kritiksaran"></p>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
