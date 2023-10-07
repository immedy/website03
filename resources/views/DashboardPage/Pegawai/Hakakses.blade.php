@extends('DashboardPage.Layout.dashboard')
@section('DashboardLayout')
    <div class="app-main flex-column flex-row-fluid">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xl">
            <div class="flex-lg-row-fluid ms-lg-10">
                <!--begin::Card-->
                <div class="card card-flush mb-6 mb-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header pt-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="d-flex align-items-center">{{ $pegawai->nama }}
                                <span class="text-gray-600 fs-6 ms-1">({{ $pegawai->nip }})</span>
                            </h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <form id="kt_modal_update_role_form" class="form" action="{{ route('AddHakAkses') }}" method="post">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll"
                                data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header"
                                data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                                <div class="fv-row">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bolder form-label mb-2">Role Permissions</label>
                                    <!--end::Label-->
                                    <!--begin::Table wrapper-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                            <!--begin::Table body-->
                                            <tbody class="text-gray-600 fw-bold">
                                                <!--begin::Table row-->
                                                <!--end::Table row-->
                                                <!--begin::Table row-->
                                                @foreach ($Permission as $p )
                                                <tr>
                                                    <!--begin::Label-->
                                                    <input type="text" value="{{ $pegawai->user->id }}" hidden name="id">
                                                    <td class="text-gray-800">{{ $p->name }}t</td>
                                                    
                                                    <!--end::Label-->
                                                    <!--begin::Input group-->
                                                    <td>
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex">
                                                            <!--begin::Checkbox-->
                                                            <label
                                                                class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $p->id }}" name="permission_id[]"
                                                                    {{ in_array($p->name, $pegawai->user->permissions->pluck('name')->toArray()) ? 'checked' : '' }} />
                                                                <span class="form-check-label">Aktif</span>
                                                            </label>
                                                            <!--end::Checkbox-->                                                            
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </td>
                                                    <!--end::Input group-->
                                                </tr>
                                                @endforeach
                                                <!--end::Table row-->
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Scroll-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <a href="/ManajemenPengguna" class="btn btn-light me-3"
                                    data-kt-roles-modal-action="cancel">Kembali</a>
                                <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    @endsection
