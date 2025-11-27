<!DOCTYPE html>

<html
        lang="en"
        class="light-style layout-navbar-fixed layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="../../assets/"
        data-template="vertical-menu-template-no-customizer">
<head>
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} :: {{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('web_components/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
            rel="stylesheet"/>

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/css/rtl/core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/css/style.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/swiper/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/libs/spinkit/spinkit.css')}}" />
    <!-- Page CSS -->
{{--    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/css/pages/app-email.css') }}" />--}}
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/css/pages/cards-advance.css') }}" />
    <link rel="stylesheet" href="{{ asset('web_components/assets/vendor/css/pages/cards-advance.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('web_components/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('web_components/assets/js/config.js') }}"></script>
    @stack('styles')
</head>
<body>
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        @include('pages.user.includes.main-menu')
        <div class="layout-page">
            @include('pages.user.includes.header-nav')
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!-- / Content -->
            </div>
            @include('pages.user.includes.footer')
            <!-- Content wrapper -->
        </div>
    </div>
    <div class="content-backdrop fade"></div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{ asset('web_components/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('web_components/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/@form-validation/umd/bundle/popular.min.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/toastr/toastr.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
<script src="{{ asset('web_components/assets/vendor/libs/block-ui/block-ui.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('web_components/assets/js/main.js') }}"></script>

<!-- Page JS -->
{{--<script src="{{ asset('web_components/assets/js/app-email.js') }}"></script>--}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@include('pages.user.includes.toastr')
@stack('scripts')
</body>
