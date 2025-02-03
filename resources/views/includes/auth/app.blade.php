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

  {{-- jquery --}}
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/auth/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/auth/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  {{-- TinyMCE Editor --}}
  {{-- <script src="https://cdn.tiny.cloud/1/s8vxh9jel6z3d5sf9bo8nr85yc4rhai16ge99t7zquz9n2io/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> --}}

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/auth/css/style.css') }}" rel="stylesheet">

  {{-- Style --}}
  @stack('style')
</head>

<body>
    {{-- @include('includes.auth.header')
    @include('includes.auth.sidebar') --}}

    @php
        $authRoutes = ['auth.login', 'auth.register', 'auth.forgot_password', 'auth.reset'];
    @endphp

    @if (!in_array(Route::currentRouteName(), $authRoutes))
        @include('includes.auth.header')
        @include('includes.auth.sidebar')
    @endif

    @php
        // Define routes where the main tag should not be applied
        $excludedRoutes = [
            'auth.login',
            'auth.register',
            'auth.forgot_password',
            'auth.reset'
        ];
    @endphp

    {{-- <main id="main" class="main">
      @yield('content')
    </main> --}}

    @if (!in_array(Route::currentRouteName(), $excludedRoutes))
        <main id="main" class="main">
            @yield('content')
        </main>
    @else
        @yield('content')
    @endif

    {{-- @include('includes.auth.footer') --}}
    @if (!in_array(Route::currentRouteName(), $authRoutes))
        @include('includes.auth.footer')
    @endif

    {{-- Script --}}
    @stack('script')
</body>

</html>