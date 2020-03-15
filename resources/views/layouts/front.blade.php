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
                        <p><span>الكلمة الآن في:</span> <a href="#">800.567.1234</a></p>
                    </div>
                </div>

                <div class="col-lg-7 col-md-7">
                    <div class="top-header-right">
                        <div class="login-signup-btn">
                            <p><a href="#">تسجيل الدخول</a> <span>وإما</span> <a href="#">تسجيل</a></p>
                        </div>

                        <ul class="social">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="bahama-mobile-nav">
            <div class="logo">
                <a href="index.html">
                    <img src="{{asset('template/img/logo.png')}}" alt="logo">
                </a>
            </div>
        </div>

        <div class="bahama-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('template/img/logo.png')}}" alt="logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a href="index.html" class="nav-link active">الصفحة الرئيسية<i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="index.html" class="nav-link active">منزل واحد في</a></li>

                                    <li class="nav-item"><a href="index-2.html" class="nav-link">المنزل اثنين</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="#" class="nav-link">صفحات<i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="#" class="nav-link">معلومات عنا</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="about-us-1.html" class="nav-link">معلومات عنا 1</a></li>

                                            <li class="nav-item"><a href="about-us-2.html" class="nav-link">معلومات عنا 2</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a href="team.html" class="nav-link">الفريق</a></li>

                                    <li class="nav-item"><a href="#" class="nav-link">خدمات</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="services-1.html" class="nav-link">نمط الخدمات 1</a></li>

                                            <li class="nav-item"><a href="services-2.html" class="nav-link">نمط الخدمات 2</a></li>

                                            <li class="nav-item"><a href="single-services.html" class="nav-link">تفاصيل الخدمات</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a href="#" class="nav-link">تجول في السوق</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="shop.html" class="nav-link">تجول في السوق</a></li>

                                            <li class="nav-item"><a href="single-product.html" class="nav-link">المنتجات الفردية في</a></li>

                                            <li class="nav-item"><a href="cart.html" class="nav-link">عربة التسوق</a></li>

                                            <li class="nav-item"><a href="checkout.html" class="nav-link">المخارج</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a href="#" class="nav-link">مدونة</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="blog-1.html" class="nav-link">شبكة بلوق</a></li>

                                            <li class="nav-item"><a href="blog-2.html" class="nav-link">المدونة اليمنى الشريط الجانبي</a></li>

                                            <li class="nav-item"><a href="single-blog.html" class="nav-link">تفاصيل المدونة</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a href="pricing.html" class="nav-link">تقييم الأسعار</a></li>

                                    <li class="nav-item"><a href="error-404.html" class="nav-link">404 خطأ</a></li>

                                    <li class="nav-item"><a href="faq.html" class="nav-link">التعليمات</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="#" class="nav-link">خدمات<i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="services-1.html" class="nav-link">نمط الخدمات 1</a></li>

                                    <li class="nav-item"><a href="services-2.html" class="nav-link">نمط الخدمات 2</a></li>

                                    <li class="nav-item"><a href="single-services.html" class="nav-link">تفاصيل الخدمات</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="#" class="nav-link">تجول في السوق <i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="shop.html" class="nav-link">تجول في السوق</a></li>

                                    <li class="nav-item"><a href="single-product.html" class="nav-link">المنتجات الفردية في</a></li>

                                    <li class="nav-item"><a href="cart.html" class="nav-link">عربة التسوق</a></li>

                                    <li class="nav-item"><a href="checkout.html" class="nav-link">المخارج</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="#" class="nav-link">مدونة<i class="fas fa-chevron-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="blog-1.html" class="nav-link">شبكة بلوق</a></li>

                                    <li class="nav-item"><a href="blog-2.html" class="nav-link">المدونة اليمنى الشريط الجانبي</a></li>

                                    <li class="nav-item"><a href="single-blog.html" class="nav-link">تفاصيل المدونة</a></li>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="contact.html" class="nav-link">اتصل بنا</a></li>
                        </ul>

                        <div class="others-options">
                            <a href="contact.html" class="btn btn-primary">الشروع في</a>
                        </div>
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
                        <a href="#"><img src="{{asset('template/img/logo.png')}}" alt="image"></a>
                        <p>أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. الذين نفسها.</p>
                    </div>

                    <form class="newsletter-form" data-toggle="validator">
                        <input type="email" class="newsletter-input" placeholder="عنوان بريدك الإلكتروني" name="EMAIL" required autocomplete="off">
                        <button type="submit"><i class="flaticon-paper-plane"></i></button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>خدمات العملاء في</h3>

                    <ul class="services-widget-list">
                        <li><a href="#">بلدي باهاما</a></li>
                        <li><a href="#">باهاما وسائل الإعلام</a></li>
                        <li><a href="#">الاتصال والتكوين</a></li>
                        <li><a href="#">تحمل</a></li>
                        <li><a href="#">دروس الفيديو</a></li>
                        <li><a href="#">تطبيق باهاما</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>روابط مفيدة في</h3>

                    <ul class="links-widget-list">
                        <li><a href="#">خريطة التغطية</a></li>
                        <li><a href="#">النشرة الإخبارية</a></li>
                        <li><a href="#">تطبق الشروط والأحكام</a></li>
                        <li><a href="#">إنحراف عن الشكل</a></li>
                        <li><a href="#">الشهادات - التوصيات</a></li>
                        <li><a href="#">شركاؤنا</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h3>ابقى على تواصل</h3>

                    <div class="widget-contact-info">
                        <p>
                            <a href="#">1 (800) 216 20 20</a>
                            <span>(خدمة العملاء والدعم)</span>
                            <a href="#">1 (800) 216 20 20</a>
                            <span>(للعملاء الجدد)</span>
                            1600 هاريسون افي، مكتب 203، نيويورك، 309090
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <p><i class="far fa-copyright"></i>حقوق الطبع والنشر بهاما 2019 جميع الحقوق محفوظة</p>
        </div>
    </div>
</footer>
<!-- End Footer Area -->
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
@yield('script')
</body>

</html>
