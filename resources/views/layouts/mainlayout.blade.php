<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.partials.head')
</head>
<body>
@include('layouts.partials.navbar')
@include('layouts.partials.head')
@include('layouts.partials.sidebar')
@yield('content')
{{-- @include('layouts.partials.footer')
@include('layouts.partials.footer-scripts') --}}
</body>
</html>

































{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="images/favicon.ico" />
  </head>
      @include('layouts.partials.sidebar')
@yield('content')
{{-- @include('layout.partials.footer')
@include('layout.partials.footer-scripts') --}}

