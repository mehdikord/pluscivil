<html lang="fa">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('template/css/animate.min.css')}}">
    <!-- FontAwesome Min CSS -->
    <link rel="stylesheet" href="{{asset('template/css/fontawesome.min.css')}}">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="{{asset('template/css/magnific-popup.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('template/css/flaticon.css')}}">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="{{asset('template/css/nice-select.min.css')}}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{asset('template/css/meanmenu.css')}}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{asset('template/css/owl.carousel.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('template/css/style.css')}}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('template/css/rtl.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('template/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.min.css')}}">

    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{asset('template/css/font.css')}}">

    <title>@yield('title')</title>

    <link rel="icon" type="image/png" href="{{asset('template/img/favicon.png')}}">
    @yield('head')
</head>

<body>

<!-- Start Preloader Area -->
<div class="preloader">
    <div class="spinner"></div>
</div>
<!-- End Preloader Area -->

<!-- Start Header Area -->
<header class="header-area">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-5">
                    <div class="top-header-left">
                        @if(auth()->check())
                            <span class="text-white">{{auth()->user()->name}} عزیز ، خوش اومدی</span> @if(auth()->user()->role_id < 4)<span><a class="btn btn-info" href="{{route('management_dashboard')}}">مدیریت</a></span> @endif
                            @endif
                    </div>
                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="top-header-right">
                        <div class="login-signup-btn">
                            @if(auth()->check())
                                <p><a href="{{route('profile')}}" class="text-white"><i class="fas fa-user"></i> پروفایل کاربری</a><span> - </span> <a href="{{route('logout')}}" class="text-warning"><i class="fas fa-times"></i> خروج</a></p>
                                @else
                            <p><a href="{{route('front_login')}}">ورود به حساب</a> <span>یا</span> <a href="{{route('register')}}">ثبت نام</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="bahama-mobile-nav">
            <div class="logo text-iranyekan text-white">
                <a href="/">
                    پلاس عمران
                </a>
            </div>
        </div>

        <div class="bahama-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand text-iranyekan text-white" href="/">
                        پلاس عمران
{{--                        <img src="" alt="logo">--}}
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav text-iranyekan">
                            <li class="nav-item"><a href="{{route('index')}}" class="nav-link @if(\Illuminate\Support\Facades\Request::is('/')) active @endif">صفحه اصلی</a>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">خدمات <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">

                                    @foreach($main_services as $main_service)
                                    <li class="nav-item"><a href="" class="nav-link">{{$main_service->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">نمونه کار ها <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
{{--                                    <li class="nav-item"><a href="shop.html" class="nav-link">تجول في السوق</a></li>--}}
                                </ul>
                            </li>

                            <li class="nav-item"><a href="#" class="nav-link @if(\Illuminate\Support\Facades\Request::is('store')) active @endif">فروشگاه فایل <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{route('front.file.store')}}" class="nav-link">ورود به فروشگاه</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">بلاگ <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
{{--                                    <li class="nav-item"><a href="blog-1.html" class="nav-link">شبكة بلوق</a></li>--}}
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">درباره ما <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
{{--                                    <li class="nav-item"><a href="blog-1.html" class="nav-link">شبكة بلوق</a></li>--}}
                                </ul>
                            </li>

                            <li class="nav-item"><a href="contact.html" class="nav-link">تماس با ما</a></li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
<!-- End Header Area -->

@yield('content')

<!-- Start Footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="/" class="text-iranyekan text-white">پلاس عمران</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <p><i class="fas fa-copyright"></i> تمامی حقوق برای پلاس عمران محفوظ است</p>
            <hr class="bg-white w-50">
            <p><i class="fas fa-laptop-code"></i>  طراحی،توسعه و پشتیبانی <a class="text-white" href="http://mehdikord.ir">Mehdi Kord</a></p>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
<script src="{{asset('sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
<div class="go-top"><i class="fas fa-arrow-up"></i></div>
<!-- jQuery Min JS -->
<script src="{{asset('template/js/jquery.min.js')}}"></script>
<!-- Popper Min JS -->
<script src="{{asset('template/js/popper.min.js')}}"></script>
<!-- Bootstrap Min JS -->
<script src="{{asset('template/js/bootstrap.min.js')}}"></script>
<!-- MeanMenu JS -->
<script src="{{asset('template/js/jquery.meanmenu.js')}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('template/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
<!-- Parallax Min JS -->
<script src="{{asset('template/js/parallax.min.js')}}"></script>
<!-- Nice Select Min JS -->
<script src="{{asset('template/js/jquery.nice-select.min.js')}}"></script>
<!-- WOW Min JS -->
<script src="{{asset('template/js/wow.min.js')}}"></script>
<!-- AjaxChimp Min JS -->
<script src="{{asset('template/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator Min JS -->
<script src="{{asset('template/js/form-validator.min.js')}}"></script>
<!-- Contact Form Min JS -->
<script src="{{asset('template/js/contact-form-script.js')}}"></script>
<!-- Bahama Map JS -->
<script src="{{asset('template/js/bahama-map.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('template/js/main.js')}}"></script>
@include('includes.alert_message')
@include('includes.simple_message')
@yield('script')
</body>

</html>
