<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title')</title>
    <base href="{{asset('')}}">
    <!-- Custom fonts for this template-->
    <link href="asset/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="asset/admin/css/nunito.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="asset/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/admin/css/toastr.css">
{{--    <link rel="stylesheet" href="asset/admin/vendor/datatables/dataTables.bootstrap4.min.css">--}}
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
@include('admin.layouts.menu')
<!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
        @include('admin.layouts.header')
        <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
@include('admin.layouts.footer')
</body>
</html>