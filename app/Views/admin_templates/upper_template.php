<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shivangani Tandon Academy |Admin_Dashbord</title>

    <!-- Favicon / Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <meta name="theme-color" content="#FE002A">


    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media='all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.css') ?>" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
    .app-main {
        /* Background image settings */
        background: url('<?= base_url('public/images/e02f845d79a058200f4b117409e1c218273b8b6d.png') ?>') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
    }

    .app-header {
        background: url('<?= base_url('public/images/e02f845d79a058200f4b117409e1c218273b8b6d.png') ?>') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
    }

    .app-sidebar {
        background: url('<?= base_url('public/images/e02f845d79a058200f4b117409e1c218273b8b6d.png') ?>') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
    }

    .text-bg-primary {
        background-color: #5751E1 !important;
    }

    /* Slide from bottom to top */
    @keyframes slideUp {
        from {
            transform: translateY(100px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .toast.showing,
    .toast.show {
        animation: slideUp 0.5s ease forwards;
    }

    .navbar {
        --bs-navbar-padding-x: 0;
        --bs-navbar-padding-y: 0;
    }


    .table thead {
        --bs-table-bg-type: solid;
        background-color: #adadaddb;
        color: #ffffff;
        white-space: nowrap;
        text-align: left;
    }

    .table thead th,
    .table thead td {
        font-weight: 600;
    }


    /* Header cells above overlay */
    .table thead th {
        position: relative;
        z-index: 1;
        background: transparent;
        color: var(--bs-table-color);
        text-align: center;
        font-weight: 600;
        vertical-align: middle;
    }

    /* Table cells padding and colors */
    .table> :not(caption)>*>* {
        padding: 0.5rem;
        color: var(--bs-table-color-state, var(--bs-table-color-type, var(--bs-table-color)));
        border-bottom-width: var(--bs-border-width);
        box-shadow: inset 0 0 0 9999px transparent !important;
        background-color: transparent !important;
    }

    /* Fix first column width */
    .table td:first-child,
    .table th:first-child {
        width: 100px;
        max-width: 100px;
        min-width: 100px;
        white-space: nowrap;
        text-align: center;
    }

    /* Prevent text wrapping in all table cells */
    .table td,
    .table th {
        white-space: nowrap;
        font-size: small;
        text-transform: uppercase;
        padding: 1px;
    }

    .card {
        --bs-card-bg: transparent;
        background-color: transparent !important;
        box-shadow: none;
    }



    .text-heading {
        font-size: 16px !important;
    }

    .navbar-nav>.user-menu>.dropdown-menu>li.user-header {
        min-height: 15px !important;
        padding: 10px;
        text-align: center;
    }

    .navbar-nav>.user-menu>.dropdown-menu>li.user-header>p {
        z-index: 5;
        margin-top: 0px;
        font-size: small;
        word-wrap: break-word;
    }

    .navbar-nav>.user-menu>.dropdown-menu>.user-footer {
        padding: 0px;
        font-size: small;
    }


    .sidebar-wrapper .nav-icon {
        min-width: 1rem;
        max-width: 1rem;
    }

    .sidebar-menu .nav-link p {
        font-size: small;
        text-transform: uppercase;
    }

    .sidebar-wrapper .nav-treeview>.nav-item>.nav-link {
        padding: 5px 5px 5px 10px;
    }
</style>

<body class="layout-fixed sidebar-expand-lg sidebar-open">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">