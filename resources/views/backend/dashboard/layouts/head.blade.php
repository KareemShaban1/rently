<head>
    <base href="">
    <title>
        Makany
    </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{ asset('backend/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('backend/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    {{-- <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/plugins/global/style.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}


    @if (App::getLocale() == 'ar')
        <link href="{{ asset('backend/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/plugins/global/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .header {
                direction: rtl
            }
        </style>
    @else
        <link href="{{ asset('backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/plugins/global/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .header {
                direction: ltr
            }
        </style>
    @endif
    <link href="{{ asset('backend/datatables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-bs4.min.css" rel="stylesheet">


    @stack('styles')

</head>
