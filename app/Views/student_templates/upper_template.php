<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
    <!-- Basic Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shivangani Tandon Academy | Student Dashboard</title>

    <!-- Favicon / Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/images/commonImages/SivanganiTandon12.jpg') ?>">
    <meta name="theme-color" content="#5751E1">


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
    <link rel="stylesheet" href="<?= base_url('/dist/css/adminlte.css') ?>" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
    :root {
        --primary-color: #5751E1;
        --secondary-color: #FE002A;
    }

    .app-main {
        background: url('<?= base_url('public/images/e02f845d79a058200f4b117409e1c218273b8b6d.png') ?>') no-repeat center center;
        background-size: cover;
        background-attachment: fixed;
    }

    .app-header {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
    }

    .app-sidebar {
        background: #1a1a2e;
        color: #ffffff;
    }

    .text-bg-primary {
        background-color: var(--primary-color) !important;
    }

    .sidebar-menu .nav-link.active {
        background-color: var(--primary-color) !important;
        color: #fff !important;
    }

    .card {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(5px);
        margin-bottom: 20px;
    }

    .card-header {
        background: transparent;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        font-weight: 600;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: #4640c1;
        border-color: #4640c1;
    }

    /* Custom styles for course progress */
    .progress-bar {
        background-color: var(--primary-color);
    }
</style>

<body class="layout-fixed sidebar-expand-lg sidebar-open">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
