<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
@php
 $fab_icon = App\Models\Logo::find(1);
@endphp
<link rel="shortcut icon" type="image/x-icon" href="{{asset('website/imgs/logo')}}/{{$fab_icon->fab_icon}}">
<link rel="stylesheet" href="{{asset('website/css/main.css')}}">
<link rel="stylesheet" href="{{asset('website/css/custom.css')}}">
 @livewireStyles
</head>
<body>
    
    <livewire:header-component />

    {{ $slot }}

    <livewire:footer-component />
    
    <!-- Vendor JS-->
<script src="{{asset('website/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('website/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('website/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('website/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('website/js/plugins/slick.js')}}"></script>
<script src="{{asset('website/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('website/js/plugins/wow.js')}}"></script>
<script src="{{asset('website/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('website/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('website/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('website/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('website/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('website/js/plugins/counterup.js')}}"></script>
<script src="{{asset('website/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('website/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('website/js/plugins/isotope.js')}}"></script>
<script src="{{asset('website/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('website/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('website/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('website/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('website/js/main.js?v=3.3')}}"></script>
<script src="{{asset('website/js/shop.js?v=3.3')}}"></script>
@livewireScripts
@stack('scripts')

</body>

</html>