


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <meta name="author" content="MKB">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="MKB" />

    <!-- Bootstrap CSS -->
    <link href="{{url('public/furni')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{url('public/furni')}}/css/tiny-slider.css" rel="stylesheet">
    <link href="{{url('public/furni')}}/css/style.css" rel="stylesheet">
    <title>MKB </title>
    
    <style>
        .hero .hero-img-wrap:after {
            display : none;
        }
        .hero .hero-img-wrap img{
            left: 5px !important;
        }
        .why-choose-section .img-wrap:before{
            margin-top : 100px;
        }
        @media (min-width: 992px) { 
            .hero .hero-img-wrap:after {
            display: inherit;
        }
        
        .hero .hero-img-wrap img{
            left: -20px !important;
        }
        
        .why-choose-section .img-wrap:before{
            margin-top : 0px;
        }
        
        }
    </style>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('layouts.navbar')
    <!-- End Header/Navigation -->

    @yield('content')

    

    <!-- Start Footer Section -->
    @include('layouts.footer')
    <!-- End Footer Section -->


    <script src="{{url('public/furni')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('public/furni')}}/js/tiny-slider.js"></script>
    <script src="{{url('public/furni')}}/js/custom.js"></script>
    <script src="{{url('public/furni')}}/js/jquery-3.7.1.min.js"></script>
    <script src="{{url('public/furni')}}/js/sweetalert2.js"></script>
    <script>
        @if(session()->has('error'))
        Swal.fire({
            text: "{{session()->get('error')}}",
            icon: 'error',
            confirmButtonText: 'Ok'
            })
        @elseif(session()->has('success'))
            Swal.fire({
                text: "{{session()->get('success')}}",
                icon: 'success',
                confirmButtonText: 'Ok'
                })
        @endif
    </script>
    @stack('js')
</body>

</html>