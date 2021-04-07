<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="">

    {{-- boostrap --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    {{-- animate --}}
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    {{-- classy --}}
    <link rel="stylesheet" href="{{asset('assets/css/classy-nav.css')}}">
    {{-- toastr --}}
    <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
    {{-- popup --}}
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    {{-- font-awesome --}}
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    {{-- owl-carousel --}}
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    {{-- lightbox --}}
    <link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


    <style>
    #headerPopup{
  width:75%;
  margin:0 auto;
}

#headerPopup iframe{
  width:100%;
  margin:0 auto;
}
    </style>

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <!-- Line -->
        <div class="line-preloader"></div>
    </div>
    @include('sweet::alert')
    
        @include('website.layout.includes._header')
        @yield('content')
        @include('website.layout.includes._footer')


<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{asset('assets/js/jquery/jquery-2.2.4.min.js')}}"></script>
{{-- Toastr --}}
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('assets/js/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap js -->
    <script src="{{asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- All Plugins js -->
    <script src="{{asset('assets/js/plugins/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('assets/js/active.js')}}"></script>
    @yield('script')
</body>

</html>