<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Dashboard|RSUD DAYAKU RAJA</title>
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('DashboardPage/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('DashboardPage/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    
</head>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    @include('sweetalert::alert')
    @yield('dashboard')


    <script src="{{ asset('DashboardPage/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('DashboardPage/js/scripts.bundle.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    <script src="{{ asset('DashboardPage/js/referensi.js') }}"></script>
    <script src="{{ asset('DashboardPage/js/UserDetail.js') }}"></script>
    <script src="{{ asset('DashboardPage/js/validationpassword.js') }}"></script>
    <script src="{{ asset('DashboardPage/js/date/settings.js') }}"></script>
    <script src="{{ asset('DashboardPage/js/Kritiksaran.js') }}"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
    <script src="{{ asset('DashboardPage/js/tanggal.js') }}"></script>
    <script>
       $(document).ready(function () {
            $('#instalasi').on('change', function () {
                var instalasi = $(this).val();
                if (instalasi) {
                    $.ajax({
                        url: '/get-ruangan',
                        type: 'GET',
                        data: {instalasi: instalasi},
                        success: function (data) {
                            $('#ruangan').empty();
                            $('#ruangan').append('<option value="">Pilih Ruangan</option>');
                            $.each(data, function (key, value) {
                                $('#ruangan').append('<option value="' + value.id + '">' + value.ruangan + '</option>');
                            });
                        }
                    });
                } else {
                    $('#ruangan').empty();
                    $('#ruangan').append('<option value="">Pilih Ruangan</option>');
                }
            });
        });
    </script>


</body>
<!--end::Body-->

</html>
