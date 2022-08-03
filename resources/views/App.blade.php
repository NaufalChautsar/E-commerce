<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion | Template</title>

    <!-- Google Font -->
    <link href="{{url ('https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap')}}"
    rel="stylesheet">
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
<!-- Css Styles -->
    <link rel="stylesheet" href="{{asset ('assets/front/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset ('assets/front/css/style.css')}}" type="text/css">
<!-- End -->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @yield('Navbar')
    {{-- @include('tools.Nav') --}}
    @yield('Main')

 <!-- Js Plugins -->
    <script src="{{asset ('assets/front/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset ('assets/front/js/mixitup.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset ('assets/front/js/main.js')}}"></script>
 <!-- End -->
</body>

</html>