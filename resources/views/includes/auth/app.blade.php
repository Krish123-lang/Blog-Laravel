<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title') - {{ config('app.name') }} </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/auth/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/auth/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet">
</head>

<body>
    {{-- @include('includes.header') --}}

    @yield('content')

    {{-- @include('includes.sidebar') --}}

    {{-- @include('includes.footer') --}}
</body>

</html>