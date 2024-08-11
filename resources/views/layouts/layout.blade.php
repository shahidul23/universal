<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Mohammad Shohel" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Universal Medical">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- SITE TITLE -->
<title>
    @yield('title', 'Universal Medical')
</title>
<!-- CSS -->
@include('partials.styles')

</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <div class="mobile-sticky-body-overlay"></div>
        <div class="wrapper">

            <!--dashboard & sidebar-->  
            @include('partials.sidebar')
            <div class="page-wrapper">
                <!-- Header -->
                <header class="main-header " id="header">
                    <!-- navbar -->
                    @include('partials.header')
                </header>

             @include('partials.messages')
    
            <div class="content-wrapper">
                <div class="content">
                    <!-- Main Content -->
                    @yield('content')
                    <!-- End Main Content -->
                </div>
            </div>
    
    <!-- START FOOTER -->
    @include('partials.footer')
    <!-- END FOOTER -->
        </div>
    </div>
      
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

{{-- Scripts --}}
@include('partials.scripts')

{{-- Custom Scripts --}}
@yield('scripts')

</body>
</html>